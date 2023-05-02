# XAMPP

XAMPP は、`Apache`、`MariaDB(MySQL)`、`PHP`、`Perl` を含むオープンソースのウェブサーバーですが、

今回は `Apache`、`MariaDB(MySQL)`、`PHP` のみを使用し、それぞれを個別にインストールしている。(XAMPP は使用しない)

## 2ch-bbs

`Apache` の `htdocs` にシンボリックリンクを作成する。

``` PowerShell
PowerShell 7.3.4
PS C:\Windows\System32> New-Item -Value 'C:\Users\path\to\Development\PHP\2ch-bbs' -Path 'C:\Users\path\to\AppData\Local\Apache24\htdocs\' -Name 2ch-bbs -ItemType SymbolicLink

    Directory: C:\Users\path\to\AppData\Local\Apache24\htdocs

Mode                 LastWriteTime         Length Name
----                 -------------         ------ ----
l----          2023/05/02     5:05                2ch-bbs -> C:\Users\path\to\Development\PHP\2ch-bbs
```
