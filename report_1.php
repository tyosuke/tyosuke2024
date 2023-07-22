<SCRIPT LANGUAGE="PHP">

	extract($_REQUEST);

// Copyright (C) 2001-2003 All right reserved by Shinya Kondo ( CGI KON )

// メインプログラム

	$days = getdate(time());
	$date = sprintf("%04d/%02d/%02d",$days["year"],$days["mon"],$days["mday"]);

	if($edit) {
		$fp = @fopen("report_1.tsv","a");
		if($fp) {
			$report = ereg_replace("\x0D\x0A|\x0D|\x0A","<BR>",$report);

			$record .= $r_date."\t";
			$record .= $r_name."\t";
			$record .= $report."\n";

			fputs($fp,$record);
			fclose($fp);
			$info = "登録が完了しました。";
			$back = "TRUE";
		} else {
			$error = "登録できませんでした。";
		}
	}

	if($back) {
		$r_name = "";
		$report = "";
	}

	if(!$error) $r_date = $date;

</SCRIPT>
<HTML>
<HEAD>
	<TITLE>業務日報</TITLE>
	<META Http-Equiv="Content-Type" Content="text/html;charset=EUC-JP">
</HEAD>
<BODY>
<FORM ACTION="report_1.php" METHOD="post">
<CENTER>
<TABLE BORDER="0" BGCOLOR="#EEEEEE" CELLSPACING="1" CELLPADDING="25" WIDTH="70%">
	<TR>
		<TD ALIGN="center">
			<FONT SIZE="4" COLOR="#888888"><B>業　務　日　報</B></FONT>

			<TABLE BORDER="1" BGCOLOR="#EEEEEE" CELLSPACING="1" CELLPADDING="5" WIDTH="100%">
				<TR>
					<TD BGCOLOR="#DDDDDD" NOWRAP><FONT SIZE="3" COLOR="#888888"><B>報告日</B></FONT></TD>
					<TD><INPUT TYPE="text" NAME="r_date" VALUE="<?php echo $r_date; ?>"></TD>
				</TR>
				<TR>
					<TD BGCOLOR="#DDDDDD" NOWRAP><FONT SIZE="3" COLOR="#888888"><B>報告者</B></FONT></TD>
					<TD><INPUT TYPE="text" NAME="r_name" VALUE="<?php echo $r_name; ?>"></TD>
				</TR>
				<TR>
					<TD BGCOLOR="#DDDDDD" NOWRAP><FONT SIZE="3" COLOR="#888888"><B>内　容</B></FONT></TD>
					<TD><TEXTAREA NAME="report" COLS="60" rows="10"><?php echo $report; ?></TEXTAREA></TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>
<BR>
			<FONT COLOR="#0000FF"><?php echo $info; ?></FONT>
			<FONT COLOR="#FF0000"><?php echo $error; ?></FONT>

<P>
			<INPUT TYPE="submit" NAME="edit" VALUE="報告する">　
			<INPUT TYPE="submit" NAME="back" VALUE="内容クリア">
<P>
<FONT SIZE=2><I>
Copyright (C) 2001-2003 All right reserved by <A HREF="http://cgikon.com">CGI KON</A>
</I></FONT>
</CENTER>
</FORM>
</BODY>
</HTML>
