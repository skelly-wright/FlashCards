<?php

$cardsets = [
    [
        "ID"=>1,
        "title"=>"Math Cards",
        "cards"=> [
            [
                "ID"=>1,
                "header"=>"Multiplication Card"
            ],
            [
                "ID"=>2,
                "header"=>"Division Card"
            ],
        ],
        
    ],
    [
        "ID"=>2,
        "header"=>"Science Cards"
    ],
    [
        "ID"=>3,
        "header"=>"History Cards"
    ],
    [
        "ID"=>4,
        "header"=>"English Cards"
    ]
];

function post_card(Int $cardSetID, String $front = "", String $back = "")
{
    $db = new SQLite3('FlashCardsDB.db');

    $header = explode("\n", $front)[0];
    // $ID = get

    $db->exec("INSERT INTO Cards(Header, Front, Back, ID, CardsetID) VALUES(".$header.",".$front.",".$back.",".$ID.",".$cardSetID.")");

    // global $cardsets;
    // $cardSetID -= 1;
    // $ID = count($cardsets[$cardSetID]["cards"]) + 1;
    // array_push($cardsets[$cardSetID]["cards"],
    //     [
    //         "ID"=>$ID,
    //         "header"=>$content
    //     ]
    // );
}

function post_cardSet($ID)
{

}
function get_card($cardSetID, $cardID)
{
    $db = new SQLite3('FlashCardsDB.db');
    $db->exec("INSERT INTO Cards(CardsetID, Header) VALUES(1, 'Addition')");
    $res = $db->query('SELECT * FROM cars');

    while ($row = $res->fetchArray()) {
        echo "{$row['id']} {$row['name']} {$row['price']} \n";
    }

    // global $cardsets;
	// foreach($cardsets as $cardset)
	// {
	// 	if($cardset["ID"]==$cardSetID) { 
    //         foreach($cardset["cards"] as $card) {
    //             if($card["ID"]==$cardID) {
    //                 return $card["header"];
    //             }
    //         }
    //     }
	// }
}

function get_cardSet($ID)
{
    $db = new SQLite3('FlashCardsDB.db');
    $res = $db->query('SELECT * FROM Cardsets WHERE ID=' . $ID);

    if ($row = $res->fetchArray() == false) echo "hi there";
    else {
        $res = $db->query('SELECT * FROM Cardsets WHERE ID=' . $ID);
        while ($row = $res->fetchArray()) {
            echo "{$row['ID']} {$row['Title']} \n";
        }
    }

    
}

function put_card(Int $cardSetID, Int $cardID, String $content)
{
    global $cardsets;
    $cardSetID -= 1;
    $cardID -= 1;
    $putArray = array("header" => $content);
	$cardsets[$cardSetID]["cards"][$cardID] = array_merge($cardsets[$cardSetID]["cards"][$cardID], $putArray);
}

function put_cardSet($ID)
{

}

function delete_card($cardSetID, $cardID)
{
    global $cardsets;
    $i = 0;
	foreach($cardsets as $cardset)
	{
		if($cardset["ID"]==$cardSetID) { 
            foreach($cardset["cards"] as $card) {
                if($card["ID"]==$cardID) {
                    array_splice($cardset["cards"], $cardID-1, 1); 
                    $i--;
                };
                if($card["ID"]>$cardID) {
                    $cardset["cards"][$i]["ID"]--; 
                };
                $i++;
            }
            $cardsets[$cardSetID-1]["cards"] = $cardset["cards"];
        }
	}
}

function delete_cardSet($ID)
{
    
}

get_cardSet(2);
// echo get_card(1,1) . ": First card of first set.\n";

// post_card(1, "Addition Card");
// echo get_card(1,3) . ": New card for first set.\n";

// put_card(1,3,"Subtraction Card");
// echo get_card(1,3) . ": New card edited.\n";

// delete_card(1,1);
// echo get_card(1,1) . ": First card of first set deleted. Second card becomes first card.\n";
?>