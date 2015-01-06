set -e

echo Compiling SAMPHP plugin... Please stand by.
gcc -c -m32 -o ./sampgdk.o ./src/sampgdk/sampgdk.c -D SAMPGDK_AMALGAMATION -D linux
g++ -shared -O2 -m32 -o ./samphp sampgdk.o  -I/usr/local/include/php -I/usr/local/include/php/Zend -I/usr/local/include/php/TSRM -I/usr/local/include/php/main -I/usr/local/include/php/sapi/embed -I./src -w ./src/*.cpp -w ./src/sampgdk/*.cpp -lrt -lphp5 -lresolv -D __LINUX__
echo Done.
