# XAMPP

`XAMPP` は使用せず、`Apache`、`MariaDB(MySQL)`、`PHP` のみを使用し、それぞれを個別にインストールして環境構築する。

`Apache`、`MariaDB(MySQL)`、`PHP`はそれぞれの公式サイトからダウンロードし、単体では`path`をとしてあるところから始める。

---

`Apache` の `htdocs` にシンボリックリンクを作成する。

``` PowerShell
PowerShell 7.3.4
PS C:\Windows\System32> New-Item -Value 'C:\Users\path\to\Development\PHP\2ch-bbs' -Path 'C:\Users\path\to\AppData\Local\Apache24\htdocs\' -Name 2ch-bbs -ItemType SymbolicLink

    Directory: C:\Users\path\to\AppData\Local\Apache24\htdocs

Mode                 LastWriteTime         Length Name
----                 -------------         ------ ----
l----          2023/05/02     5:05                2ch-bbs -> C:\Users\path\to\Development\PHP\2ch-bbs
```

`httpd.conf` を編集する。

``` httpd.conf
Define SRVROOT "C:/Users/path/to/AppData/Local/Apache24"
ServerRoot "${SRVROOT}"
Listen 8080
LoadModule php_module C:/Users/path/to/AppData/Local/Programs/php/php8apache2_4.dll
ServerName localhost:8080

<FilesMatch "\.php$">
  AddHandler php-script .php
  AddType application/x-httpd-php .php
</FilesMatch>

PHPIniDir "C:/Users/path/to/AppData/Local/Programs/php/php.ini"
```

## MariaDB(MySQL)

MySQLはローカルにインストールしてあるものを使用する。

## phpMyAdmin

`htdocs` 配下に配置する。

``` PowerShell
C:\Users\path\to\AppData\Local\Apache24\htdocs\phpMyAdmin
```

<details>
<summary>`config.sample.inc.php` を コピーし、`config.inc.php` にリネームする。</summary>

``` config.inc.php
$cfg['blowfish_secret'] = '32桁の文字列を配置'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */

$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = 'root';

# 以下をすべてコメントアウトを外す
/* Storage database and tables */
$cfg['Servers'][$i]['pmadb'] = 'phpmyadmin';
$cfg['Servers'][$i]['bookmarktable'] = 'pma__bookmark';
$cfg['Servers'][$i]['relation'] = 'pma__relation';
$cfg['Servers'][$i]['table_info'] = 'pma__table_info';
$cfg['Servers'][$i]['table_coords'] = 'pma__table_coords';
$cfg['Servers'][$i]['pdf_pages'] = 'pma__pdf_pages';
$cfg['Servers'][$i]['column_info'] = 'pma__column_info';
$cfg['Servers'][$i]['history'] = 'pma__history';
$cfg['Servers'][$i]['table_uiprefs'] = 'pma__table_uiprefs';
$cfg['Servers'][$i]['tracking'] = 'pma__tracking';
$cfg['Servers'][$i]['userconfig'] = 'pma__userconfig';
$cfg['Servers'][$i]['recent'] = 'pma__recent';
$cfg['Servers'][$i]['favorite'] = 'pma__favorite';
$cfg['Servers'][$i]['users'] = 'pma__users';
$cfg['Servers'][$i]['usergroups'] = 'pma__usergroups';
$cfg['Servers'][$i]['navigationhiding'] = 'pma__navigationhiding';
$cfg['Servers'][$i]['savedsearches'] = 'pma__savedsearches';
$cfg['Servers'][$i]['central_columns'] = 'pma__central_columns';
$cfg['Servers'][$i]['designer_settings'] = 'pma__designer_settings';
$cfg['Servers'][$i]['export_templates'] = 'pma__export_templates';
```

</details>

## ER図

``` mermaid
erDiagram
    THREAD ||--o{ COMMENT : has
    THREAD {
        int id
        string thread_title
    }
    COMMENT {
        int id
        string username
        string text
        timestamp post_date
        int thread_id
    }
```

---

## References

<details>
<summary>links</summary>

[2chan-bbs-udemy/comment_add.php at main · Shin-sibainu/2chan-bbs-udemy · GitHub](https://github.com/Shin-sibainu/2chan-bbs-udemy/blob/main/app/functions/comment_add.php)

[PHP For Windows: Binaries and sources Releases](https://windows.php.net/download#php-8.2)

[Windowsでシンボリックリンクを作る | DevelopersIO](https://dev.classmethod.jp/articles/make_windows_symbolic_link/)

[PHP: 実行時設定 - Manual](https://www.php.net/manual/ja/datetime.configuration.php#ini.date.timezone)

[PHP 8.2.5 - phpinfo()](http://localhost:8080/phpinfo.php)

[PHP: Windows 上での PHP の手動インストール - Manual](https://www.php.net/manual/ja/install.windows.manual.php)

[apache (event) + php（CGI/FastCGI）の設定。ユーザ毎の権限で実行 | サーバーレシピ](https://server-recipe.com/3369/)

[Windows10にApache 2.4.37をインストール | 株式会社オルタ](https://aulta.co.jp/technical/server-build/windows10/apache/install-apache-2-4-37)

[Apache | ApaheからPHPを利用できるように設定する](https://www.javadrive.jp/apache/php/index1.html)

[Windowsで Apache + PHP + MySQL のサーバー構築](https://www.saluteweb.net/~oss_phpmysql.html)

[PHP | php.iniファイルの作成と初期設定](https://www.javadrive.jp/php/install/index5.html)

[【PHPエラー対処方法】Fatal error: Call to undefined method T::f() | MaryCore](https://marycore.jp/prog/php/call-to-undefined-method/)

[爆速コーディングを実現！Emmetの使い方とVSCodeのおすすめ設定まとめ | Web Design Trends](https://webdesign-trends.net/entry/13588)

[Windows環境にphpmyadminをインストールする](https://blog.ver001.com/windows_phpmyadmin/)

[FAQ - Frequently Asked Questions — phpMyAdmin 5.2.1 documentation](http://localhost:8080/phpmyadmin/doc/html/faq.html#faq6-39)

[Configuration — phpMyAdmin 5.2.1 documentation](http://localhost:8080/phpmyadmin/doc/html/config.html#cfg_blowfish_secret)

[phpMyAdmin | phpMyAdminへのログインとログアウト](https://www.javadrive.jp/phpmyadmin/install/index2.html)

[phpMyAdminをインストールしMySQLに接続する方法](https://engineer-milione.com/tips/mysql-phpmyadmin.html)

[Windows版PHPでphp_mbstring.dllが見つからない場合のエラーの原因と解決方法の1つ - r_nobuホームページ (のぶねこブログ)](https://nobuneko.com/blog/archives/2017/10/php_error_windows_php_php_mbstring_dll_not_found.html)

[How to Fix - Failed to set session cookie. Maybe you are using HTTP instead of HTTPS to access phpMyAdmin. - CodeAstrology](https://codeastrology.com/failed-set-session-cookie-http-instead-https-phpmyadmin/)

[How to Fix – Failed to set session cookie. Maybe you are using HTTP instead of HTTPS to access phpMyAdmin. | Fails, Fix it, Session](https://in.pinterest.com/pin/how-to-fix-failed-to-set-session-cookie-maybe-you-are-using-http-instead-of-https-to-access-phpmyadmin--616148792748590460/)

[How to Fix - Failed to set session cookie. Maybe you are using HTTP instead of HTTPS to access phpMyAdmin. - CodeAstrology](https://codeastrology.com/failed-set-session-cookie-http-instead-https-phpmyadmin/)

[XAMPP - phpMyAdmin「接続できません。設定が無効です。」対処方法 - PC設定のカルマ](https://pc-karuma.net/xampp-phpmyadmin-cannot-connect/)

[XAMPP | phpMyAdminのログイン/パスワードに関する設定](https://www.javadrive.jp/xampp/mysql/index3.html)

[PHP: 接続、および接続の管理 - Manual](https://www.php.net/manual/ja/pdo.connections.php)

[phpMyAdmin | phpMyAdminの環境保管領域を設定する](https://www.javadrive.jp/phpmyadmin/install/index3.html)

[パラメータの埋め込み - PHP開発 虎の巻](http://www.dicre.com/php/php-param)

[HTMLタグ/ページ全般タグ/水平線に色を付ける - TAG index](https://www.tagindex.com/html_tag/page/hr_color.html)

[mvc モデル - Google 検索](https://www.google.com/search?q=mvc+%E3%83%A2%E3%83%87%E3%83%AB&rlz=1C1TKQJ_jaJP1021JP1021&oq=mvc&aqs=chrome.1.69i57j0i131i433i650j0i512l8.6299j0j4&sourceid=chrome&ie=UTF-8)

[「2022年最新」無料ER図ツール8選・ER図の簡単解説](https://gitmind.com/jp/er-diagram-tool-free.html)

</details>
