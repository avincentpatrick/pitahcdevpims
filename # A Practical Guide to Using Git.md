# A Practical Guide to Using Git for Source Control

This guide provides a walkthrough of the essential Git commands and concepts for effective source control.

---

## Table of Contents
1.  [Initial Setup: Configure Your Identity](#1-initial-setup-configure-your-identity)
2.  [The Basic Git Workflow](#2-the-basic-git-workflow)
3.  [Creating a Repository](#3-creating-a-repository)
4.  [Making Changes (The Core Workflow)](#4-making-changes-the-core-workflow)
5.  [Working with Branches](#5-working-with-branches)
6.  [Working with Remote Repositories](#6-working-with-remote-repositories)
7.  [Undoing Changes](#7-undoing-changes)
8.  [Ignoring Files](#8-ignoring-files)

---

## 1. Initial Setup: Configure Your Identity

Before you start committing, Git needs to know who you are. This information is stored with every commit you make. This is the most common first-time setup step.

Set your name and email for all repositories on your computer (global configuration).

```bash
# Set your name
git config --global user.name "Your Name"

# Set your email (use the one associated with your GitHub/GitLab account)
git config --global user.email "youremail@example.com"
```

To verify your settings, you can run:
```bash
git config --global user.name
git config --global user.email
```

---

## 2. The Basic Git Workflow

Git thinks about your files in three main states:

1.  **Working Directory:** Your local project folder with all the files.
2.  **Staging Area (Index):** A "holding area" where you prepare the changes you want to include in your next commit. This lets you craft precise commits.
3.  **Repository (`.git` directory):** Where Git permanently stores your committed changes as snapshots of your project.

The flow is:
`Working Directory` -> `git add` -> `Staging Area` -> `git commit` -> `Repository`

---

## 3. Creating a Repository

You can either start a new repository from scratch or get a copy of an existing one.

### Initialize a New Repository

If you have an existing project that isn't under source control yet, navigate to its directory and run:

```bash
git init
```

This creates a hidden `.git` subdirectory, which is your local Git repository.

### Clone an Existing Repository

To get a copy of a project from a remote server (like GitHub), you use `git clone`.

```bash
# Clone using HTTPS
git clone https://github.com/user/repository.git

# Or clone using SSH
git clone git@github.com:user/repository.git
```

This downloads the entire project and its history into a new folder.

---

## 4. Making Changes (The Core Workflow)

This is the cycle you'll repeat most often.

### Step 1: Check the Status

See which files have been modified, which are staged, and which are untracked.

```bash
git status
```

### Step 2: Stage Your Changes

Use `git add` to move changes from your working directory to the staging area.

```bash
# Stage a specific file
git add path/to/your/file.txt

# Stage all modified and new files in the current directory and subdirectories
git add .
```

### Step 3: Commit Your Changes

A commit takes the files from the staging area and saves them permanently to your local repository.

```bash
# Opens your default text editor to write a detailed commit message
git commit

# Or, provide a short message directly from the command line
git commit -m "Add feature X to handle user login"
```

> **Tip:** Write clear and descriptive commit messages. The first line should be a short summary (about 50 chars), followed by a blank line and then a more detailed explanation if needed.

### View Commit History

To see a log of all the commits you've made:

```bash
git log

# For a more compact view
git log --oneline --graph --decorate
```

---

## 5. Working with Branches

Branches allow you to work on new features or bug fixes in an isolated environment without affecting the main codebase (often the `main` or `master` branch).

### Create and Switch Branches

```bash
# List all local branches (the * indicates your current branch)
git branch

# Create a new branch
git branch new-feature

# Switch to the new branch to start working on it
git switch new-feature

# Or, create and switch to a new branch in one command
git switch -c another-new-feature
```

### Merge Branches

Once your feature is complete, you merge it back into your main branch.

```bash
# First, switch back to the branch you want to merge into
git switch main

# Then, merge the feature branch into main
git merge new-feature
```

If there are conflicting changes between the branches, Git will pause the merge and ask you to resolve the conflicts manually. After resolving, you'll `git add` the fixed files and run `git commit` to finalize the merge.

---

## 6. Working with Remote Repositories

To collaborate with others, you need to sync your changes with a remote repository (e.g., on GitHub).

### View Remotes

```bash
# List your configured remotes (usually 'origin' by default)
git remote -v
```

### Push Changes to a Remote

`git push` sends your committed changes from your local repository to the remote.

```bash
# Push your 'main' branch to the 'origin' remote
git push origin main
```

### Pull Changes from a Remote

`git pull` fetches changes from the remote and immediately merges them into your current local branch.

```bash
# Fetch and merge changes from the 'origin' remote's 'main' branch
git pull origin main
```

---

## 7. Undoing Changes

*   **Discard changes in a file:** `git restore <file>`
*   **Unstage a file:** `git restore --staged <file>`
*   **Amend the last commit:** `git commit --amend` (Don't do this on commits you've already pushed!)
*   **Revert a commit:** `git revert <commit-hash>` (This creates a *new* commit that undoes the changes from a previous one. It's safe for public history.)

---

## 8. Ignoring Files

Create a file named `.gitignore` in the root of your project to tell Git which files or directories it should ignore. This is useful for build artifacts, log files, and environment-specific files.

**Example `.gitignore` file:**

```
# Ignore node_modules directory
/node_modules

# Ignore all .log files
*.log

# Ignore environment configuration
.env
```