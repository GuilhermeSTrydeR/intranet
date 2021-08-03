@ECHO off

@REM esse BAT FILE serve para executar o commit automatico dos arquivos do projeto, lembrando que o REMOTE se encontra na pasta .git, e não nesse arquivo

REM essa variavel ira receber o texto que sera digitado pelo usuario e usado como commit
SET /P commit=escreva o commit:
CLS

git add .
git commit -m "%commit%"
git push origin master
