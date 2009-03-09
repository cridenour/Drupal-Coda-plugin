#/bin/bash
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'
echo '<html>'
echo '<head>'
echo '<title>File PHP Syntax Report</title>'
echo '<style type="text/css">'
echo 'body { margin: 0; padding: 1em; font-family: "Myriad Pro", "Lucida Grande", sans-serif; font-size: 10pt; }'
echo '</style>'
echo '</head>'
echo '<body>'
echo '<h1>Run PHP</h1>'
echo '<h2 style="padding-bottom: 10px; border-bottom: 1px solid #999;">'
echo  "$CODA_FILEPATH"
echo '</h2>'
echo '<pre>'
if [ -f "$CODA_FILEPATH" ]; then
	/usr/bin/php "$CODA_FILEPATH"
fi
echo '</pre>'
echo '</body>'