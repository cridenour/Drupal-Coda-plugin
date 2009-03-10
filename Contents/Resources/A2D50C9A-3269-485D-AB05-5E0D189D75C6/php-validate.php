#/bin/bash
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'
echo '<html>'
echo '<head>'
echo '<title>Document PHP Syntax Report</title>'
echo '<style type="text/css">'
echo 'body { margin: 0; padding: 1em; font-family: "Myriad Pro", "Lucida Grande", sans-serif; font-size: 10pt; }'
echo '</style>'
echo '</head>'
echo '<body>'
echo '<h1>Document PHP Syntax Report</h1>'
/usr/bin/php -l
echo '</body>'