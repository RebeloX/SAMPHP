set -e

SRCDIR=${HOME}/php5.6.4-source
DISTDIR=${HOME}/dist
rm -rf $SRCDIR

PHP5="php-5.6.4"

PHPFEATURES="--disable-zts --disable-cli --disable-cgi --enable-embed=shared --with-mhash --without-gd --without-t1lib --without-libvpx --enable-mbstring --enable-mbregex --with-mcrypt --with-pgsql --disable-session --enable-sockets --with-sqlite3 --without-dom --with-mysql --with-mysqli=libmysql --enable-pdo --with-pdo-mysql --with-pdo-sqlite --with-pdo-pgsql --disable-opcache \
"

mkdir -p ${SRCDIR}
if [ ! -f ${DISTDIR} ] 
then
mkdir -p ${DISTDIR}
fi

cd ${DISTDIR}

if [ ! -f ${DISTDIR}/${PHP5}.tar.gz ] 
then
    wget -c http://us.php.net/get/${PHP5}.tar.gz/from/this/mirror/
    mv index.html ${PHP5}.tar.gz
fi


echo Unpacking downloaded archives. This process may take several minutes...

cd ${SRCDIR}

# Unpack them all
echo Extracting ${PHP5}...
tar xzf ${DISTDIR}/${PHP5}.tar.gz
echo Done.


#PHP 5
echo ###################
echo Compiling PHP
echo ###################
cd ${SRCDIR}/${PHP5}
export CXXFLAGS="-m32"
export LDFLAGS="-m32"
export CPPFLAGS="-m32"
./configure ${PHPFEATURES}
make
make install

#register module
ldconfig

echo Finished.
exit 0
