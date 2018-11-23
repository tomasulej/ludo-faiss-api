$ cat myscript
Xvfb :0 -screen 0 1280x768x24&
export DISPLAY=:0
/usr/bin/mscore $1 -o $2
