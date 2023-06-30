<?php
if (!function_exists('dump')) {

    function dump()
    {
        $str = '';
        $tmp = func_get_args();
        foreach ($tmp as $key => $val) {
            $str .= var_export($val, true);
        }
        print('<pre style="font-size:12px;font-family:\'MS Gothic\';">' . $str . '</pre>');
    }
}
if (!function_exists('dd')) {
    function dd(...$data)
    {
        ini_set("highlight.comment", "#969896; font-style: italic");
        ini_set("highlight.default", "#FFFFFF");
        ini_set("highlight.html", "#D16568");
        ini_set("highlight.keyword", "#7FA3BC; font-weight: bold");
        ini_set("highlight.string", "#F2C47E");
        foreach ($data as $d) {
            $output = highlight_string("<?php\n\n" . var_export($d, true), true);
            echo "<div style=\"background-color: #1C1E21; padding: 1rem\">{$output}</div>";
        }
        die();
    }
}
