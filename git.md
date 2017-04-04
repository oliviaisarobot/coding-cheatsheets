# Git cheatsheet

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
