#!/usr/bin/env ruby
$KCODE = 'U'

$char_to_entity = { }
File.open("#{ENV['CODA_BUNDLE_SUPPORT']}/entities.txt").read.scan(/^(\d+)\t(.+)$/) do |key, value|
  $char_to_entity[[key.to_i].pack('U')] = value
end

def encode (text)
  text.gsub(/[^\x00-\x7F]|["'<>&]/) do |ch|
    ent = $char_to_entity[ch]
    ent ? "&#{ent};" : sprintf("&#x%02X;", ch.unpack("U")[0])
  end
end

STDIN.read.scan(/(?x)

    ( <\?(?:[^?]*|\?(?!>))*\?>
    | <!-- (?m:.*?) -->
    | <\/? (?i:a|abbr|acronym|address|applet|area|b|base|basefont|bdo|big|blockquote|body|br|button|caption|center|cite|code|col|colgroup|dd|del|dfn|dir|div|dl|dt|em|fieldset|font|form|frame|frameset|h1|h2|h3|h4|h5|h6|head|hr|html|i|iframe|img|input|ins|isindex|kbd|label|legend|li|link|map|menu|meta|noframes|noscript|object|ol|optgroup|option|p|param|pre|q|s|samp|script|select|small|span|strike|strong|style|sub|sup|table|tbody|td|textarea|tfoot|th|thead|title|tr|tt|u|ul|var)\b
        (?:[^>"']|"[^"]*"|'[^']*')*
      >
    | &(?:[a-zA-Z0-9]+|\#[0-9]+|\#x[0-9a-fA-F]+);
    )
    |([^<&]+|[<&])

  /x) do |tag, text|
  print tag.to_s, encode(text.to_s)
end
