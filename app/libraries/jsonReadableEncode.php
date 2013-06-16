<?php

class nwHelpers
{
    public static function jsonReadableEncode($in, $indent = 0, Closure $_escape = null)
    {
        if (__CLASS__ && isset($this))
        {
            $_myself = array($this, __FUNCTION__);
        }
        elseif (__CLASS__)
        {
            $_myself = array('self', __FUNCTION__);
        }
        else
        {
            $_myself = __FUNCTION__;
        }

        if (is_null($_escape))
        {
            $_escape = function ($str)
            {
                return str_replace(
                    array('\\', '"', "\n", "\r", "\b", "\f", "\t", '/', '\\\\u'),
                    array('\\\\', '\\"', "\\n", "\\r", "\\b", "\\f", "\\t", '\\/', '\\u'),
                    $str);
            };
        }

        $out = '';

        foreach ($in as $key=>$value)
        {
            $out .= str_repeat("\t", $indent + 1);
            $out .= "\"".$_escape((string)$key)."\": ";

            if (is_object($value) || is_array($value))
            {
                $out .= "\n";
                $out .= call_user_func($_myself, $value, $indent + 1, $_escape);
            }
            elseif (is_bool($value))
            {
                $out .= $value ? 'true' : 'false';
            }
            elseif (is_null($value))
            {
                $out .= 'null';
            }
            elseif (is_string($value))
            {
                $out .= "\"" . $_escape($value) ."\"";
            }
            else
            {
                $out .= $value;
            }

            $out .= ",\n";
        }

        if (!empty($out))
        {
            $out = substr($out, 0, -2);
        }

        $out = str_repeat("\t", $indent) . "{\n" . $out;
        $out .= "\n" . str_repeat("\t", $indent) . "}";

        return $out;
    }

    public static function prettyJson($json) {

        $result      = '';
        $pos         = 0;
        $strLen      = strlen($json);
        $indentStr   = '  ';
        $newLine     = "\n";
        $prevChar    = '';
        $outOfQuotes = true;

        for ($i=0; $i<=$strLen; $i++) {

            // Grab the next character in the string.
            $char = substr($json, $i, 1);

            // Are we inside a quoted string?
            if ($char == '"' && $prevChar != '\\') {
                $outOfQuotes = !$outOfQuotes;

            // If this character is the end of an element,
            // output a new line and indent the next line.
            } else if(($char == '}' || $char == ']') && $outOfQuotes) {
                $result .= $newLine;
                $pos --;
                for ($j=0; $j<$pos; $j++) {
                    $result .= $indentStr;
                }
            }

            // Add the character to the result string.
            $result .= $char;

            // If the last character was the beginning of an element,
            // output a new line and indent the next line.
            if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos ++;
                }

                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }

            $prevChar = $char;
        }

        return $result;
    }
}


