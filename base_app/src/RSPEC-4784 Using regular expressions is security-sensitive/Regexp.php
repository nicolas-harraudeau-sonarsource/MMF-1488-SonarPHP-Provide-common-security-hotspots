<?php

// The functions are Questionable whatever their argument unless specified otherwise.

// Disable deprecation warning
error_reporting(E_ALL ^ E_DEPRECATED);

function validateInput($pattern, $inputs)
{
    $replacement = 'myvalue';
    $input = $inputs[0];

    # PCRE functions
    preg_filter($pattern, $replacement, $inputs); // Questionable
    preg_grep($pattern, $inputs); // Questionable
    preg_match_all($pattern, $input); // Questionable
    preg_match($pattern, $input); // Questonable
    if (version_compare(PHP_VERSION, '7.0', '>=')) {
        preg_replace_callback_array( // Questionable
            [
                $pattern => function ($match) {},
            ],
            $input
        );
    }
    preg_replace_callback($pattern, function ($matches) {return '';}, $input); // Questionable
    preg_replace($pattern, $replacement, $input); // Questionable
    preg_split($pattern, $input); // Questionable

    fnmatch ($pattern, $input);

    // POSIX EXTENDED functions
    if (version_compare(PHP_VERSION, '7.0', '<')) {
        ereg_replace($pattern, $replacement, $input); // Questionable
        ereg($pattern, $input); // Questionable
        eregi_replace($pattern, $replacement, $input); // Questionable
        eregi($pattern, $input); // Questionable
        split($pattern, $input); // Questionable
        spliti($pattern, $input); // Questionable
    }

    // Multibyte POSIX EXTENDED
    mb_ereg_replace($pattern, $replacement, $input); // Questionable
    mb_ereg($pattern, $input); // Questionable
    mb_eregi_replace($pattern, $replacement, $input); // Questionable
    mb_eregi($pattern, $input); // Questionable
    mb_ereg_match($pattern, $input); // Questionable
    mb_ereg_replace_callback($pattern, '', $input); // Questionable
    mb_ereg_search_init($input); // Questionable


    mb_ereg_search_pos($pattern); // Questionable
    mb_ereg_search_pos(); // OK

    mb_ereg_search_regs($pattern); // Questionable
    mb_ereg_search_regs(); // OK

    mb_ereg_search($pattern); // Questionable
    mb_ereg_search(); // OK
}

validateInput('/[A-Za-z0-9]+/', array('thisstringismatched thisoneisnot#$%@ but it still '
    . 'passes the regexp because of the missing anchors.'));
