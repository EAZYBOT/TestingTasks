<?php

function makeArticlePreview($text, $link) {
    $result = mb_substr($text, 0, 200);

    $pos = mb_strlen($result);
    for ($i = 0; $i < 3; $i++) {
        if ($pos !== false) {
            $pos = mb_strrpos($result, ' ', $pos - mb_strlen($result) - 1);
        }
    }

    if ($pos !== false) {
        $endReplace = mb_substr($result, $pos + 1);
        $endReplace = "<a href=\"$link\">$endReplace...</a>";
        $result = mb_substr($result, 0, $pos + 1) . $endReplace;
    } else {
        $result = "<a href=\"$link\">$result...</a>";
    }

    return $result;
}

$articleText = "Всемирную паутину образуют сотни миллионов веб-серверов. Большинство ресурсов Всемирной паутины основано на технологии гипертекста. Гипертекстовые документы, размещаемые во Всемирной паутине, называются веб-страницами. Несколько веб-страниц, объединённых общей темой или дизайном, а также связанных между собой ссылками и обычно находящихся на одном и том же веб-сервере, называются веб-сайтом. Для загрузки и просмотра веб-страниц используются специальные программы — браузеры (англ. browser).";
$articleLink = "https://ru.wikipedia.org/wiki/%D0%92%D1%81%D0%B5%D0%BC%D0%B8%D1%80%D0%BD%D0%B0%D1%8F_%D0%BF%D0%B0%D1%83%D1%82%D0%B8%D0%BD%D0%B0";

$articlePreview = makeArticlePreview($articleText, $articleLink);

echo $articlePreview;
