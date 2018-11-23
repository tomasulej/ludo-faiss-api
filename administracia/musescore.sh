$ cat myscript
Xvfb :0 -screen 0 1280x768x24&
export DISPLAY=:0
/usr/bin/mscore $1 -o $2.xml
/usr/bin/mscore $1 -o $2.mp3
/usr/bin/mscore $1 -o $2.png
sudo /usr/bin/python /var/www/html/public/py/xml2abc.py /var/www/html/piesne/import/$2.xml > $2.abc