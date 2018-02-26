# Git cheatsheet

## Git config

When you first set up Git to use with Github, you will need to set your username and password on your local machine.

`git config --global user.name "John Doe"` will let you define your name

`git config --global user.email johndoe@example.com` will let you define your email address, use the same one that you used to sign up for Github

## Basics

`git init` creates a new git repository locally

`git status` allows you to see the recent changes you made to any files in the repository

`git add "filename"` in order to be able to push your changes to a remote repository, you need to add the changes that you want to save by selecting the file

* you can also select folders
* the `*` asterisk and `.` work as wildcards, if you want to add multiple files at once

`git add docs/*` this will add every file in the docs folder

`git add .` this will add every file you recently modified

`git commit -m "Message"` you commit the changes, with means that they receive an ID which lets the repository track these changes

`git remote add "repository name + repository URL"` because you created the repository locally, you need to link your local directory to the remote one, and to do this, you use the remote add command

`git remote add origin https://github.com/oliviaisarobot/coding-cheatsheets.git` will connect your local repository to the specified remote repository, and name it `origin` (naming it will make it easier to use the remote repository later, origin is a conventional and easy to remember name)

`git push -u origin master` to push your commited changes to the remote repository, you need to use `git push`, but because this is the first time you are pushing to this remote repository, you have to specify the name (origin) and the branch (master), the `-u` parameter lets git remember the settings, so next time you are in the same local directory, you can use just `git push` to achieve the same result.

`git pull origin master` if you worked on the same repository from a different computer, or someone else from your team made changes to the remote repository, you will need to **pull** to download the latest changes to your local repository

`git pull`

## Forking

On Github, you can click on the **Fork** button to copy a repository. This will create an exact copy of all the files, under your own remote repository. This allows you to work on an existing repo, make your own additions, develop it in a different direction than the original one. The changes you make to this forked repository, will NOT affect the original repository and its files.

## Cloning

When you already have an existing remote repository, eg. you forked one from someone else, or you created an empty repository through Github, you also want to copy the files to your local directory, so you can work on them in your own development environment.

`git clone https://github.com/oliviaisarobot/coding-cheatsheets.git`

## Branching

`git branch [branch]` create a new branch

`git checkout [branch]` move to the new branch

`git checkout -b [branch]` create and move to the new branch

`git branch -d [branch]` delete local branch

`git prune origin remote` deletes non existing branches, if also deleted from remote

`git push -u origin [branch]` creates the branch on remote, upstream is important

## Merging

`git merge [branch]` merge branch into the branch we are in (where we are checked out) HEAD

## Rebasing

`git rebase [branch]` lines up all commits of the branch under our current branch (checked out) HEAD with rebase, we can solve conflicts if the master branch has changed since i last pulled from it, and i'm trying to merge my branch into it: `git rebase master`

## Detaching head or attaching to commits

`git checkout [commit]`

## Git log

`git log` lists the git hashes, long stuff, enough to type the first few characters relative refs / you can start off on a branch or something specified when you are looking for a commit

`^` move up one commit

`~<num>` move up by number

`master^`

`master^^`

`master~4`

## Git force branches

`git branch -f master HEAD~4` relocate branches, forces the master 4 commits before the head

1. checkout HEAD based on git log commit hash
2. you can relocate branches compared to the HEAD position

## Reset an revert

`git reset HEAD~1` removes the previous commit, current branch moves above HEAD (HEAD on branch in this case)

`git revert HEAD`

## Remote

`git clone`

`git fetch` fetch commits from master to origin, syncs local and remote on a COMMIT level, it does not change files

`git pull` shorthand for fetch + merge

`git fakeTeamwork [branch] [num]` you can add a number of fake commits to the master branch

can't push if changes have been made to the remote,
`git fetch`

`git rebase o/master (local)`

`git merge o/master (local)`

`git push`

`git pull` = git fetch + git merge

`git pull --rebase` = git pull + git push
