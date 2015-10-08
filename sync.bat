@ECHO OFF
git status
SET /P c=Continue to sync? (y/n) : 
IF "%c%"=="y" (GOTO Add)
IF "%c%"=="n" (GOTO End) ELSE (GOTO Error)
:Add
git add .
@echo Added
SET /P msg=Enter Commit :
IF "%msg%"=="" GOTO Error
git commit -m "%msg%"
@echo Commited
git status
SET /P c=Push? (Y/N) : 
IF "%c%"=="y" (git push origin master
@echo "Sync Successful")
IF "%c%"=="n" (GOTO End) ELSE (GOTO Error)
GOTO End
:Error
ECHO Invalid Input, Exiting.
GOTO End
:End
pause