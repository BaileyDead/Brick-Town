<?php
function ProfanityFilter($text)
{
  // you probably shouldn't look at this array.
  $filterWords = array(
    "nigger",
    "niglet",
    "bldn",
    "brick luke deez nuts",
    "bigot",
    "faggot",
    "cunt",
    "dickwad",
    "furfag",
    "russian pig",
    "rigging",
    "fag",
    "swine",
    "cracker",
    "squaw",
    "nigga",
    "mong",
    "cock and ball torture",
    "cbt",
    "isaac hymer",
    "spacebuilder",
    "brick luke",
    "brick-luke",
    "brick-hill",
    "brickhill",
    "porn",
    "ejaculation",
    "cum",
    "sperm",
    "semen",
    "cowgirl",
    "blowjob",
    "doggly style",
    "pornography",
    "jacking off",
    "jerking off",
    "sex",
    "pornhub",
    "stripper",
    "prostitute",
    "xvideos",
    "e621",
    "rule34",
    ".onion",
    "wanker",
    "hitler",
    "rule34.xxx",
    "r34",
    "rul34",
    "brick luke deez",
    "brick deez luke nutz",
    "mentally retarded",
    "fuck"
  );

  $filterCount = sizeof($filterWords);
  for ($i = 0; $i < $filterCount; $i++) {
    $text = preg_replace_callback('/\b' . $filterWords[$i] . '/i', function ($matches) {
      return str_repeat('*', strlen($matches[0]));
    }, $text);
  }
  return $text;
}

// GOD FUCKING KILL ME