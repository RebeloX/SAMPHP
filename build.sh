set -e

echo Compiling SAMPHP plugin... Please stand by.
g++ -shared -O2 -m32 -o ./samphp  -I/usr/local/include/php -I/usr/local/include/php/Zend -I/usr/local/include/php/TSRM -I/usr/local/include/php/main -I/usr/local/include/php/sapi/embed -I./src -w ./src/*.cpp -w ./src/sampgdk/*.cpp -lrt -lphp5 -lresolv
echo Done.