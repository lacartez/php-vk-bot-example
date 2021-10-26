<?php

require_once "config.php";

$data = json_decode(file_get_contents('php://input'));
if($data->secret != SECRET_KEY) { 
    exit;
}

switch ($data->type) {
	case 'confirmation':
		exit(CONFIRM_KEY);

	case 'message_new':
		echo 'ok';

		$conversation_message_id = $data->object->message->conversation_message_id;
		$peer_id = $data->object->message->peer_id;
		$from = $data->object->message->from_id;

        $cmd = explode(" ", mb_strtolower($data->object->message->text, 'utf-8')); //сразу приводим все сообщения в нижний регистр
        if (!isset($cmd[0])) { //если вдруг сообщение оказалось пустым, то завершает скрипт
        	exit();
        }

        switch($cmd[0]) {
        	case '/hello':
        		exit( say($peer_id, 'Hello World!', $conversation_message_id) );
        	default:
        		exit( say($peer_id, 'Я ещё не знаю такой команды.', $conversation_message_id) );
        }

	default:
		echo 'ok';
}

function say ($peer_id, $message, $conversation_message_id) {

    $reply_data = array(
        'peer_id' => $peer_id, 
        'conversation_message_ids' => $conversation_message_id, 
        'is_reply' => 1
    );

	$url = 'https://api.vk.com/method/messages.send';

	$params = array(
        'random_id' => mt_rand(0, 1000),
        'peer_id' => $peer_id,
        'message' => $message,
        'access_token' => ACCESS_TOKEN,
        'v' => VERSION,
        'forward' => json_encode($reply_data)
    );

    file_get_contents($url, false, 
    	stream_context_create(
    		array(
    			'http' => array(
    				'method'  => 'POST',
		            'header'  => 'Content-type: application/x-www-form-urlencoded',
		            'content' => http_build_query($params)
    			)
    		)
    	)
    );// поддерживает отправку длинных сообщений
}

?>