<?php

namespace App\Exports;

use App\Models\IctRequest;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IctRequestsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $checked;

    public function __construct($checked)
    {
        $this->checked = $checked;
    }

    public function map($column): array
    {
        return [
            $column->id,
            optional($column->request_status_type)->request_status_type_name,
            $column->ticket_no,
            optional($column->request_type)->request_type_name,
            optional($column->sub_request_type)->sub_request_type_name,
            $column->request_details,
            optional($column->technical_support_representative)->last_name.', '.optional($column->technical_support_representative)->first_name,
            $column->technical_support_representative_findings,
            $column->reason_for_cancellation,
            $column->action_taken_datetime,
            $column->action_taken,
            $column->resolved_datetime,
            $column->cancelled_datetime,
            $column->acknowledged_datetime,
            optional($column->user_created)->last_name.', '.optional($column->user_created)->first_name,
            optional($column->user_updated)->last_name.', '.optional($column->user_updated)->first_name,
            $column->created_at,
            $column->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'ICT Request ID',
            'Request Status Type',
            'Ticket no.',
            'Request Type',
            'Sub-request Type',
            'Request Details',
            'Technical Support Representative',
            'Findings',
            'Reason for Cancellation',
            'Date Time Action Taken',
            'Action Taken',
            'Date Time Resolved',
            'Date Time Cancelled',
            'Date Time Acknowledge',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At',
        ];
    }

    public function query()
    {
        return IctRequest::whereIn('id', $this->checked);
    }
}
