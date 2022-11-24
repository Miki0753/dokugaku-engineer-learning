<?php

/**
 * 関数でやりたいこと
 * 読書ログを複数登録し登録された内容を変数$reviewsで受け取る
 *  1.登録を促すメッセージを表示する/echo
 *  2.各登録項目を表示/echo
 *  3.変数に代入・一時保存/fgets
 *  4.登録完了のメッセージ表示/echo
 * 
 * 引数：なし
 *    $numが1だった場合に実行されるから
 *    渡される引数が特にないから
 * 
 * 返り値：登録された読書ログ
 *    fgetsで取得した1行データを連想配列の形で格納しておく
 *    連想配列にする理由
 *    読書ログのデータをキーと値に分けると良さそうだから
 *    後でforeachするので、配列か連想配列のデータにしておく必要があるから
 * 関数の呼び出し
 * createReview関数を呼び出し、登録された読書ログを変数$reviewsで受け取る
 * 
 * 
 * */

function createReview() {
  echo '読書ログを登録してください' . PHP_EOL;
  echo '書籍名；';
  $title = trim(fgets(STDIN));
  
  echo '著者名：';
  $author = trim(fgets(STDIN));
  
  echo '読書状況(未読・読書中・読了)：';
  $status = trim(fgets(STDIN));
  
  echo '評価（5点満点の整数）：';
  $score = trim(fgets(STDIN));
  
  echo '感想：';
  $summary = trim(fgets(STDIN));
  
  // returnすると処理が終わるので手前に書く 
  echo '読書ログを登録しました' . PHP_EOL;
  
  return [
    'title' => $title,
    'author' => $author,
    'status' => $status,
    'score' => $score,
    'summary' => $summary,
  ];
}

/**
 * 登録するための配列名を宣言する。
 * ループの直ぐ側で宣言する。
 * 変数はループのなかで宣言すると、ループが回るたびに初期化されてしまうため。
 */

//$reviews = [];


/**
 * 関数でやりたいこと
 * 読書ログを複数表示する
 * 
 * 引数：$reviewsに格納されている読書ログ
 * 
 * 返り値：なし
 * echo で表示して終了なので返り値は必要ない
 */
function listReview($reviews) {

  echo '読書ログを表示します' . PHP_EOL;

  foreach ($reviews as $review) {
    echo '書籍名：' . $review['title'] . PHP_EOL;
    echo '著者名：' . $review['author'] . PHP_EOL;
    echo '読書状況：' . $review['status'] . PHP_EOL;
    echo '評価：' . $review['score'] . '点' . PHP_EOL;
    echo '感想：' . $review['summary'] . PHP_EOL;
    echo '-----------' . PHP_EOL;
  }
}

while (true) {
  //メニューを無限に繰り返し表示する
  echo '1. 読書ログを登録' . PHP_EOL;
  echo '2. 読書ログを表示' . PHP_EOL;
  echo '9. 読書ログを終了' . PHP_EOL;
  echo '番号を選択してください(1,2,9)：' . PHP_EOL;
  $num = trim(fgets(STDIN)); 

  if ($num === '1') {
    /**
     * $numが１だったら
     * createReview()が呼び出されて
     * 読書ログが登録される 
     * 返り値を変数$reviewsで受け取る
     * */ 
    $reviews[] = createReview();
    
    
    // echo '読書ログを登録してください' . PHP_EOL;
    // echo '書籍名；';
    // $title = trim(fgets(STDIN));
    
    // echo '著者名：';
    // $author = trim(fgets(STDIN));
    
    // echo '読書状況(未読・読書中・読了)：';
    // $status = trim(fgets(STDIN));
    
    // echo '評価（5点満点の整数）：';
    // $score = trim(fgets(STDIN));
    
    // echo '感想：';
    // $summary = trim(fgets(STDIN));
    
    /**
     * 読書ログが追加されたら、配列に要素を追加していく。
     * 追加していくので初期化（はじめに値をセットする）は必要ない。
     * 空の配列に要素を足していくイメージ。
     * $配列名 [] = '値'; の形式。
     * キーと値があるとわかりやすいため、配列の要素を連想配列にする。
     */
    // $reviews[] = [
      //   'title' => $title,
      //   'author' => $author,
      //   'status' => $status,
      //   'score' => $score,
      //   'summary' => $summary,
      // ];
      
      
    } elseif ($num === '2') {
    /**
     * numが2だったら
     * $reviewsに実引数が入り処理が始まる
     *   （読書ログデーターが$reviewsに入り、foreachで一つずつecho処理される）
     * */ 
    // 返り値がない関数の呼び出し
      listReview($reviews);

  } elseif ($num === '9') {
    // 9を選択した時の処理
    // アプリを終了（メニューの繰り返し表示を終了）
    echo '読書ログを終了します' . PHP_EOL;
    break;
  }
}
