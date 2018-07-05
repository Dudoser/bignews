<?php

function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function explodeTag ($listTag)
{
	for ($i=0; $i < count($listTag); $i++) 
    { 
        for ($j=0; $j < count($listTag[$i]); $j++) 
        { 
            if ($listTag[$i][$j]['tag'] != '') 
            {
                if (strpos($listTag[$i][$j]['tag'], ','))
                {
                    $listTag[$i][$j]['tag'] = explode(',', $listTag[$i][$j]['tag']);
                }
            }
        }
    }
}

function SignValig ($variable, $text)
{

    if (empty($variable))
    {
        $_SESSION['empty_row'] = $text;
        return false;
        
    }
    else
    {
        $variable = htmlspecialchars($variable);
        $variable = trim($variable);
        $variable = mb_strtolower($variable);
        if (strlen($variable) < 4) {
            $_SESSION['empty_row'] = 'пароль не может быть короче 4-х символов';
            return false;
        }
        else
        {
            return $variable;
        }
        
    }

}

function YouRedirect($string) 
{
    $request_uri = $_SERVER['REQUEST_URI'];
    $query_string = $_SERVER['QUERY_STRING'];

    $request_uri = explode('/', $request_uri);
    $request_uri = $string;
    $query_string = explode('/', $request_uri);
    $query_string = $string;
    $_SERVER['REQUEST_URI'] = $request_uri;
    $_SERVER['QUERY_STRING'] = $query_string;

    header("location:" . $string);
}