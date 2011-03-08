<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class.phpmailer.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class.smtp.php');

/**
 * 发送E-Mail邮件
 * @param $address 收件人地址，接收格式array('to', 'name', 'to', 'name', 'to', 'name', ...) 
 * @param $from 邮件发送地址
 * @param $fromName 邮件发送者称呼
 * @parma $subject 邮件主题
 * @param $htmlBody 邮件内容html
 * @param $textBody 邮件内容text
 */


function mailSend($address, $from, $fromName, $subject, $htmlBody, $textBody = null) {
	try {
		$mail = new PHPMailer(true); //New instance, with exceptions enabled

		$body = preg_replace('/\\\\/','', $htmlBody); //Strip backslashes

		$mail->CharSet = "utf-8";
		$mail->IsSendmail();  // tell the class to use Sendmail

		$mail->From       = $from;
		$mail->FromName   = $fromName;

		$mail->AddReplyTo($from, $fromName);		

		if(is_array($address)) {
			$len = count($address);
			$i = 0;
			while($i<$len) {
				$mail->AddAddress($address[$i], $address[$i+1]);
				$i += 2;
			}
		} else {
			error_reporting('Parameter Error!');
		}
		

		$mail->Subject  = $subject;
		
		if($textBody) {
			$mail->AltBody    = $textBody; // optional, comment out and test
		}
		$mail->WordWrap   = 80; // set word wrap
		$mail->MsgHTML($body);
		$mail->IsHTML(true); // send as HTML
		$mail->Send();
		return true;
	} catch (phpmailerException $e) {
		die($e->errorMessage());
	}
}

/**
 * 用SMTP方式发送E-Mail邮件
 * @param $smtp smtp服务器配置信息 $smtp = array('port'=>, 'host'=>, 'username'=>, 'password'=>);
 * @param $address 收件人地址，接收格式array('to', 'name', 'to', 'name', 'to', 'name', ...) 
 * @param $from 邮件发送地址
 * @param $fromName 邮件发送者称呼
 * @parma $subject 邮件主题
 * @param $htmlBody 邮件内容html
 * @param $textBody 邮件内容text
 */
function smtpSend($smtp, $address, $from, $fromName, $subject, $htmlBody, $textBody = null) {
	try {
		$mail = new PHPMailer(true); //New instance, with exceptions enabled

		$body             = preg_replace('/\\\\/','', $htmlBody); //Strip backslashes

		$mail->IsSMTP();                           // tell the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->CharSet = 'utf-8';

		if(isset($smtp['port']) && !empty($smtp['port'])) {
			$mail->Port = $smtp['port'];
		}

		$mail->Host       = $smtp['host']; // SMTP server
		$mail->Username   = $smtp['username'];     // SMTP server username
		$mail->Password   = $smtp['password'];            // SMTP server password

		$mail->AddReplyTo($from, $fromName);

		$mail->From       = $from;
		$mail->FromName   = $fromName;

		if(is_array($address)) {
			$len = count($address);
			$i = 0;
			while($i < $len) {
				$mail->AddAddress($address[$i], $address[$i+1]);
				$i += 2;
			}
		} else {
			error_reporting('Parameter Error!');
		}		

		$mail->Subject  = $subject;
		
		if($textBody) {
			$mail->AltBody    = $textBody; // optional, comment out and test
		}
		$mail->WordWrap   = 80; // set word wrap

		$mail->MsgHTML($body);

		$mail->IsHTML(true); // send as HTML

		$mail->Send();
		return true;
	} catch (phpmailerException $e) {
		die($e->errorMessage());
	}
}


?>