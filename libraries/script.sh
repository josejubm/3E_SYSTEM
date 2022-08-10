#!/bin/sh

wkhtmltopdf --enable-local-file-access https://github.com/josejubm /opt/lampp/htdocs/app_3emexico/libraries/reportegithub.pdf >/dev/null 2>&1 &

echo "finish"