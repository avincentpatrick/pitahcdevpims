<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentDeletionLog;
use App\Models\DocumentRecipient;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IssuanceController extends Controller
{
    public function index()
    {
        return view('issuances.index');
    }

    public function getIssuances(Request $request)
    {
        if ($request->ajax()) {
            $query = Document::query()->orderBy('created_at', 'desc');

            // Category filter
            if ($request->filled('category')) {
                $query->where('document_type_id', $request->input('category'));
            }

            // Custom search
            if ($request->filled('custom_search')) {
                $searchValue = $request->input('custom_search');
                $query->where('document_title', 'like', '%' . $searchValue . '%');
            }

            // Issuance no search
            if ($request->filled('issuance_no')) {
                $issuanceNo = $request->input('issuance_no');
                $query->where('document_reference_code', 'like', '%' . $issuanceNo . '%');
            }

            // Date range filter
            if ($request->filled('start_date')) {
                $query->whereDate('document_date', '>=', $request->input('start_date'));
            }
            if ($request->filled('end_date')) {
                $query->whereDate('document_date', '<=', $request->input('end_date'));
            }

            return Datatables::of($query)
                ->addColumn('subject', function($row){
                    $issuanceType = '';
                    switch ($row->document_type_id) {
                        case 1:
                            $issuanceType = 'PITAHC Order';
                            break;
                        case 2:
                            $issuanceType = 'PITAHC Personnel Order';
                            break;
                        case 3:
                            $issuanceType = 'PITAHC Memorandum';
                            break;
                        case 4:
                            $issuanceType = 'PITAHC Memorandum Circular';
                            break;
                    }

                    $subject = '<a href="' . asset('storage/' . $row->file_path) . '" target="_blank">' . $row->document_title . '</a>';
                    $subject .= '<br><small><em>Administrative Issuance Type: ' . $issuanceType . '</em></small>';
                    $subject .= '<br><small><em>Date Posted: ' . $row->created_at->format('Y-m-d') . '</em></small>';
                    return $subject;
                })
                ->editColumn('document_reference_code', function($row){
                    $issuanceType = '';
                    switch ($row->document_type_id) {
                        case 1:
                            $issuanceType = 'PITAHC Order';
                            break;
                        case 2:
                            $issuanceType = 'PITAHC Personnel Order';
                            break;
                        case 3:
                            $issuanceType = 'PITAHC Memorandum';
                            break;
                        case 4:
                            $issuanceType = 'PITAHC Memorandum Circular';
                            break;
                    }
                    return $issuanceType . ' ' . $row->document_reference_code;
                })
                ->addColumn('document_date', function($row){
                    return $row->document_date ? \Carbon\Carbon::parse($row->document_date)->format('Y-m-d') : 'N/A';
                })
                ->addColumn('action', function($row){
                    $editBtn = '<button type="button" class="shimmer-button edit-btn" data-id="' . $row->id . '" style="--bg: #17a2b8; --radius: 5px; padding: 5px 10px;"><span class="spark-container"><span class="spark"></span></span><span class="backdrop"></span><span class="highlight"></span><i class="fas fa-edit mr-2"></i>Edit</button>';
                    $deleteBtn = '<button type="button" class="shimmer-button delete-btn" data-id="' . $row->id . '" style="--bg: #dc3545; --radius: 5px; padding: 5px 10px;"><span class="spark-container"><span class="spark"></span></span><span class="backdrop"></span><span class="highlight"></span><i class="fas fa-trash mr-2"></i>Delete</button>';
                    return '<div style="display: flex; gap: 5px;">' . $editBtn . $deleteBtn . '</div>';
                })
                ->rawColumns(['subject', 'action'])
                ->make(true);
        }
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document_type_id' => 'required|integer',
            'document_title' => 'required|string|max:255',
            'document_reference_code' => 'required|string|max:255',
            'document_date' => 'required|date',
            'file' => 'required|file|mimes:pdf',
            'recipients' => 'nullable|string',
        ]);

        $filePath = $request->file('file')->store('issuances', 'public');

        $document = new Document();
        $document->document_type_id = $request->input('document_type_id');
        $document->document_title = $request->input('document_title');
        $document->document_reference_code = $request->input('document_reference_code');
        $document->document_date = $request->input('document_date');
        $document->file_path = $filePath;
        $document->is_archived = 0;
        $document->created_by = Auth::id();
        $document->save();

        if ($request->filled('recipients')) {
            $emails = explode(',', $request->input('recipients'));
            foreach ($emails as $email) {
                $recipient = new DocumentRecipient();
                $recipient->document_id = $document->id;
                $recipient->email_address = trim($email);
                $recipient->created_by = Auth::id();
                $recipient->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function getRecipients()
    {
        $recipients = DocumentRecipient::distinct()->pluck('email_address');
        return response()->json($recipients);
    }

    public function getDocument($id)
    {
        $document = Document::with('recipients')->find($id);
        return response()->json($document);
    }

    public function updateDocument(Request $request, $id)
    {
        $request->validate([
            'document_type_id' => 'required|integer',
            'document_title' => 'required|string|max:255',
            'document_reference_code' => 'required|string|max:255',
            'document_date' => 'required|date',
            'file' => 'nullable|file|mimes:pdf',
            'recipients' => 'nullable|string',
        ]);

        $document = Document::find($id);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            $filePath = $request->file('file')->store('issuances', 'public');
            $document->file_path = $filePath;
        }

        $document->document_type_id = $request->input('document_type_id');
        $document->document_title = $request->input('document_title');
        $document->document_reference_code = $request->input('document_reference_code');
        $document->document_date = $request->input('document_date');
        $document->updated_by = Auth::id();
        $document->save();

        // Sync recipients
        $document->recipients()->delete();
        if ($request->filled('recipients')) {
            $emails = explode(',', $request->input('recipients'));
            foreach ($emails as $email) {
                $recipient = new DocumentRecipient();
                $recipient->document_id = $document->id;
                $recipient->email_address = trim($email);
                $recipient->created_by = Auth::id();
                $recipient->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function deleteDocument(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        try {
            DocumentDeletionLog::create([
                'document_id' => $id,
                'user_id' => Auth::id(),
                'reason' => $request->input('reason'),
            ]);

            $document = Document::find($id);
            if ($document) {
                if ($document->file_path) {
                    Storage::disk('public')->delete($document->file_path);
                }
                $document->recipients()->delete();
                $document->delete();
            } else {
                return response()->json(['success' => false, 'message' => 'Document not found.'], 404);
            }

            return response()->json(['success' => true, 'message' => 'Document deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }
    }
}
