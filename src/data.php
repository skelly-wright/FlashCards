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

function post_card($ID)
{

}

function post_cardSet($ID)
{

}
function get_card($cardSetID, $cardID)
{
    global $cardsets;
	foreach($cardsets as $cardset)
	{
		if($cardset["ID"]==$cardSetID) { 
            foreach($cardset["cards"] as $card) {
                if($card["ID"]==$cardID) {
                    return $card["header"];
                }
            }
        }
	}
}

function get_cardSet($ID)
{

}

function put_card($ID)
{

}

function put_cardSet($ID)
{

}

function delete_card($ID)
{

}

function delete_cardSet($ID)
{

}

echo get_card(1,1) . "\r\n";
?>