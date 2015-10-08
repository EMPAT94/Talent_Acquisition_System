@echo off
git add *
set /p Commit= Commit Title
git commit * -m %Commit%
git status