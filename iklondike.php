<?php
//$d=date("D");
if ($showJS!="show") {
?>
 document.write("You can't steal my javaScript!");
<?php 
} else {
?>
function CardList(cardValue, arrayPlace)
{
this.cardValue = cardValue;
this.arrayPlace = arrayPlace;
}
function populateArray(valuesearch)
{

	valuesearch["faceA"]=0;
	valuesearch["face2"]=1;
	valuesearch["face3"]=2;
	valuesearch["face4"]=3;
	valuesearch["face5"]=4;
	valuesearch["face6"]=5;
	valuesearch["face7"]=6;
	valuesearch["face8"]=7;
	valuesearch["face9"]=8;
	valuesearch["face10"]=10;
	valuesearch["faceJ"]=11;
	valuesearch["faceQ"]=12;
	valuesearch["faceK"]=13;
}

function displayArray(valuesearch)
{

	document.form1.tferout.value = valuesearch;
	
}
function buildfield()
{

//Deck
document.write(""
+"<img name='deck' src='images/spacerg.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 5' onClick='threeMore()'>");
//ShowPile
document.write(""
+"<img name='deal2' src='images/spacer.gif' width='40' height='54' STYLE='z-index: 1; position: absolute; top: 5; left: 50' border='0' onClick='pickDeal(this.name)'>"
+"<img name='deal1' src='images/spacer.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 60' onClick='pickDeal(this.name)'>"
+"<img name='deal0' src='images/spacer.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 70' onClick='pickDeal(this.name)'>");
//Indicator
document.write(""
+"<img name='ind' src='images/spacer.gif' width='40' height='19' STYLE='z-index: 500; position: absolute; top: 0; left: -200' border='0' onClick='hideInd(0)'>");
//AcePiles
document.write(""
+"<img name='ace0' src='images/spacerg.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 140' onClick='moveToAce(0)'>"
+"<img name='ace1' src='images/spacerg.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 185' onClick='moveToAce(1)'>"
+"<img name='ace2' src='images/spacerg.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 230' onClick='moveToAce(2)'>"
+"<img name='ace3' src='images/spacerg.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 5; left: 275' onClick='moveToAce(3)'>");



document.write("<!-- Game Field -->");

					var s = "";
					var x, y;
					var cardpile = 30;
					var cardstacks = 7;
					
					//var imageHeight = 5;
					//var spacerHeight = [131, 126, 121, 116, 111, 106, 101];
					for(y = 0; y < cardstacks; ++y) 
					{
						for(x = 0; x < cardpile; ++x) 
						{
						if (x == 0)
						{
						document.write(""
+"<img name='colbase"+y+"' src='images/spacerg.gif' width='40' height='54' border='0' STYLE='z-index: 1; position: absolute; top: 76; left: "+ (y*55)+"' onClick='placeCard("+y+")'>");
						}
							document.write("<img name='col" + y + "_" + x + "' src='images/spacer.gif' border='0' width='40' height='54' STYLE='z-index: " + (x + 2) + "; position: absolute; top: 5; left: -200' onClick='pickCard("+y+","+x+")'>");
						}
					}
					document.write("<!-- End Game Field -->");

}
function hideInd() {
document.images.ind.style.left = -200;
cardPicked = 0;
}

function newGame()
{
	newDeck = ["AH", "2H", "3H", "4H", "5H", "6H", "7H", "8H", "9H", "10H", "JH", "QH", "KH", "AD", "2D", "3D", "4D", "5D", "6D", "7D", "8D", "9D", "10D", "JD", "QD", "KD", "AC", "2C", "3C", "4C", "5C", "6C", "7C", "8C", "9C", "10C", "JC", "QC", "KC", "AS", "2S", "3S", "4S", "5S", "6S", "7S", "8S", "9S", "10S", "JS", "QS", "KS"];
	shuffleDeck = [];
	dealStack = [];
	aceStack = [[],[],[],[]];
	acevisibility =[[],[],[],[]];
	colvisibility = [["true"],["false", "true"],["false", "false", "true"],["false", "false", "false", "true"],["false", "false", "false", "false", "true"],["false", "false", "false", "false", "false", "true"],["false", "false","false", "false", "false", "false", "true"]];
	colx = [5,50,95,140,185,230,275];
	indx = [5,50,95,140,185,230,275];
	dealx = [70,60,50];
	colcards = [[],[],[],[],[],[],[]];
	suitarray = ["H","D","C","S"];
	valuearray = ["A","2","3","4","5","6","7","8","9","10","J","Q","K"];
	var valueStorage = new Array();
	populateArray(valueStorage);
	testarray = [];
	cardPicked = 0;
		//document.form1.cardPickedF.value = 0;
	junk = "ey"
	for (i=0;i<52;++i)
	{
		var r = Math.random() * newDeck.length;
		shuffleDeck.push(newDeck.splice(r,1));
	}
	testvar = "";
	for (j=0;j<7;++j)
	{
		
		for (k=j;k<7;++k)
		{
			colcards[k].push(shuffleDeck.splice(0,1));
				if (j == 0)
				{
				document.images["colbase"+k].style.top = 70;
				document.images["colbase"+k].style.left = colx[k];
				}
				document.images["col"+k+"_"+j].style.top = 70 + (j * 19);
				document.images["col"+k+"_"+j].style.left = colx[k];
			if (colvisibility[k][j] == "true")
			{
				document.images["col"+k+"_"+j].src = "images/Full/" + colcards[k][j] + ".gif";
			} else {
				document.images["col"+k+"_"+j].src = "images/Full/back.gif";
			}
		}
	}
	document.images.deck.src = "images/Full/back.gif";
}

function threeMore()
{
	if (shuffleDeck.length != 0 || dealStack.length != 0)
	{
		if (shuffleDeck.length < 3 && shuffleDeck.length > 0)
		{
			rt = shuffleDeck.length;
		}
		else
		{
			rt = 3;
		}
		
		for (t=0;t<rt;++t)
		{
			if (shuffleDeck.length == 0)
			//put cards from dealStack back into shuffleDeck
			{
				var dsl = dealStack.length
				for (stack = 0;stack < dsl; ++stack)
				{
				shuffleDeck.push(dealStack.splice(0,1));
				}
				dealStack.push(shuffleDeck.splice(0,1));
			} else {
				dealStack.push(shuffleDeck.splice(0,1));
			}
			
		}
		if (shuffleDeck.length == 0)
		// no more cards left in shuffleDeck, don't show back of card in 'deck''
		{
			document.images.deck.src = "images/spacerg.gif";
		} else {
			document.images.deck.src = "images/Full/back.gif";
		}
		for (t=0;t<3;++t)
		{
		
			document.images["deal"+t].src = "images/spacer.gif";
			document.images["deal"+t].style.left = -200;
		}
		for (t=0;t<rt;++t)
		{
			
			document.images["deal"+t].src = "images/Full/" + dealStack[dealStack.length - t - 1] + ".gif";
			document.images["deal"+t].style.left = dealx[t];
		}
	}
//document.form1.terminal.value = shuffleDeck + "xxxx" + dealStack + "xxxx" + colvisibility + "xxxx" + colcards;
}
function topThree()
{
	for (t=0;t<3;++t)
	{
	
		document.images["deal"+t].src = "images/spacer.gif";
		document.images["deal"+t].style.left = -200;
	}

	if (dealStack.length < 3)
	{
		rt = dealStack.length
	}
	else
	{
		rt = 3
	}

	for (t=0;t<rt;++t)
	{
		
		document.images["deal"+t].src = "images/Full/" + dealStack[dealStack.length - t - 1] + ".gif";
		document.images["deal"+t].style.left = dealx[t];
	}
}
function moveToAce(aceCol)
{
	if (cardPicked == 1)
	{
		
		if (checkAce(colcards[cardPickedCol][cardPickedRow],aceStack[aceCol][(aceStack[aceCol].length - 1)],aceCol))
			{
			if (colvisibility[cardPickedCol].length == (cardPickedRow + 1))
			{
				
					aceStack[aceCol].push(colcards[cardPickedCol].splice(cardPickedRow,1));
					acevisibility[aceCol].push(colvisibility[cardPickedCol].splice(cardPickedRow,1));
					document.images.ind.src = "images/spacer.gif";
					document.images["col"+cardPickedCol+"_"+cardPickedRow].src = "images/spacer.gif";
					document.images["col"+cardPickedCol+"_"+cardPickedRow].style.top = 5;
					document.images["col"+cardPickedCol+"_"+cardPickedRow].style.left = -200;
					document.images["ace"+aceCol].src = "images/Full/" + aceStack[aceCol][(aceStack[aceCol].length -1)] + ".gif";
					cardPicked = 0;
				//document.form1.terminal.value = aceStack[aceCol];
			}
		}
	}
	else if (cardPicked == 2)
	{
		if (checkAce(dealStack[(dealStack.length - 1)],aceStack[aceCol][(aceStack[aceCol].length - 1)],aceCol))
			{
			//newRow = row + 1;
			// move card from dealStack to colcards
			aceStack[aceCol].push(dealStack.splice((dealStack.length - 1),1));
			acevisibility[aceCol].push("true");
			document.images[dealPicked].src = "images/spacer.gif";
			document.images[dealPicked].style.left = -200;
			//prevRow = newRow -1;
			//prevTop = document.images["col"+col+"_"+prevRow].style.top
			//newTopSt = prevTop.replace("px","");
			//newTop = (Number(newTopSt.valueOf()) + 10) + "px";
			//document.images["col"+col+"_"+newRow].style.top = newTop;
			//document.images["col"+col+"_"+newRow].style.left = colx[col];
			document.images["ace"+aceCol].src = "images/Full/" + aceStack[aceCol][(aceStack[aceCol].length -1)] + ".gif";
			document.images.ind.src = "images/spacer.gif";
			document.images.ind.style.left = -200;
			topThree();
			cardPicked = 0;
			//document.form1.cardPickedF.value = 0;
		}
	}
}
function placeCard(cardCol)
{
	if (cardPicked == 0)
	{
	}
	else if (cardPicked == 1)
	{
		if (checkCards(colcards[cardPickedCol][cardPickedRow],"empty"))
			{
			var colCardL = colcards[cardPickedCol].length;
			//set the indicator back to a blank
			document.images.ind.src = "images/spacer.gif";
			//how many cards need to be moved?
			moveCards = colCardL - cardPickedRow;
			oldRow = cardPickedRow;
			newRow = 0;
		//	rowlist = ""
		//	move the cards to the new array
			
			for (i = 0;i < moveCards; ++i)
			{
				colcards[cardCol].push(colcards[cardPickedCol].splice(cardPickedRow,1));
				colvisibility[cardCol].push(colvisibility[cardPickedCol].splice(cardPickedRow,1));
				document.images["col"+cardPickedCol+"_"+oldRow].src = "images/spacer.gif";
				document.images["col"+cardPickedCol+"_"+oldRow].style.top = 5;
				document.images["col"+cardPickedCol+"_"+oldRow].style.left = -200;
				//rowlist =  rowlist + "z" + colcards[col][newRow] +"c" + colvisibility[col][newRow];
				if (newRow == 0)
				{ 
					newTop = 76;
				}
				else
				{
				prevRow = newRow -1;
				prevTop = document.images["col"+cardCol+"_"+prevRow].style.top
				newTopSt = prevTop.replace("px","");
				newTop = (Number(newTopSt.valueOf()) + 19) + "px";
				}
				document.images["col"+cardCol+"_"+newRow].style.top = newTop;
				document.images["col"+cardCol+"_"+newRow].style.left = colx[cardCol];
				document.images["col"+cardCol+"_"+newRow].src = "images/Full/" + colcards[cardCol][newRow] + ".gif";
				++oldRow
				++newRow
			
			}
			cardPicked = 0;
		}
	}
	else if (cardPicked = 2)
	{
		if (checkCards(dealStack[(dealStack.length - 1)],"empty"))
		{
		
			colcards[cardCol].push(dealStack.splice((dealStack.length - 1),1));
			colvisibility[cardCol].push("true");
			document.images[dealPicked].src = "images/spacer.gif";
			document.images[dealPicked].style.left = -200;
			newTop = 70;
			newRow = 0;
			document.images["col"+cardCol+"_"+newRow].style.top = newTop;
			document.images["col"+cardCol+"_"+newRow].style.left = colx[cardCol];
			document.images["col"+cardCol+"_"+newRow].src = "images/Full/" + colcards[cardCol][newRow] + ".gif";
			document.images.ind.src = "images/spacer.gif";
			document.images.ind.style.left = -200;
			topThree();
			cardPicked = 0;
		}
	
	}
	
}

function pickDeal(dealCard)
{
	if (cardPicked == 0)
	{
		pickedArray = document.images[dealCard].src.split("/");
		imagePicked = pickedArray[pickedArray.length -1];
		ipArray = imagePicked.split(".");
		ipName = ipArray[0];
		if (ipName == dealStack[(dealStack.length - 1)])
		{
			
				dealLeft = document.images[dealCard].style.left;
				newLeftSt = dealLeft.replace("px","");
				indLeft = (Number(newLeftSt.valueOf()) + 0) + "px";
				document.images.ind.style.left = indLeft;
				document.images.ind.style.top = 5;
				document.images.ind.src = "images/picked.gif";
			//document.form1.terminal.value = indLeft;
				dealPicked = dealCard;
				cardPicked = 2
		//document.form1.cardPickedF.value = 2;
		}
	} 
	else if (cardPicked == 2)
	{
			document.images.ind.src = "images/spacer.gif";
			cardPicked = 0;
			//document.form1.cardPickedF.value = 0;
	}
	
}

function pickCard(col,row)
{
	
	if (cardPicked == 0)
	{
		if (colvisibility[col][row] == "true")
		{
			
				//place indicator next to clicked card
				indTop = document.images["col"+col+"_"+row].style.top;
				indLeft = indx[col];
				document.images.ind.src = "images/picked.gif";
				document.images.ind.style.top = indTop;
				document.images.ind.style.left = indLeft;
				cardPickedCol = col;
				cardPickedRow = row;
				cardPicked = 1;
		//document.form1.cardPickedF.value = 1;
				
				//terminal
				//document.form1.terminal.value =indTop + "aaa" + indLeft;
		}
		else
		{
			if (colvisibility[col].length == (row + 1))
			{
			document.images["col"+col+"_"+row].src = "images/Full/" + colcards[col][row] + ".gif";
			colvisibility[col][row] = "true";
			}
						
		}
	} 
	else if (cardPicked == 1)
	{
		//document.form1.terminal.value = "before" + colvisibility[col][row];
		if (colvisibility[col].length == (row + 1))
		{	
			if (colvisibility[col][row] == "true")
			{
				//document.form1.terminal.value = "yes" + colvisibility[col][row];
				if (cardPickedCol == col)
				{
					document.images.ind.src = "images/spacer.gif";
					cardPicked = 0;
					//document.form1.cardPickedF.value = 0;
				}
				else
				{
					if (checkCards(colcards[cardPickedCol][cardPickedRow],colcards[col][row]))
					{
						//find the length of the array the card was picked from
						var colCardL = colcards[cardPickedCol].length;
						//set the indicator back to a blank
						document.images.ind.src = "images/spacer.gif";
						//how many cards need to be moved?
						moveCards = colCardL - cardPickedRow;
						oldRow = cardPickedRow;
						newRow = row + 1;
						//rowlist = ""
						//move the cards to the new array
						
						for (i = 0;i < moveCards; ++i)
						{
							colcards[col].push(colcards[cardPickedCol].splice(cardPickedRow,1));
							colvisibility[col].push(colvisibility[cardPickedCol].splice(cardPickedRow,1));
							document.images["col"+cardPickedCol+"_"+oldRow].src = "images/spacer.gif";
							document.images["col"+cardPickedCol+"_"+oldRow].style.top = 5;
							document.images["col"+cardPickedCol+"_"+oldRow].style.left = -200;
							//rowlist =  rowlist + "z" + colcards[col][newRow] +"c" + colvisibility[col][newRow];
							prevRow = newRow -1;
							prevTop = document.images["col"+col+"_"+prevRow].style.top
							newTopSt = prevTop.replace("px","");
							newTop = (Number(newTopSt.valueOf()) + 19) + "px";
							document.images["col"+col+"_"+newRow].style.top = newTop;
							document.images["col"+col+"_"+newRow].style.left = colx[col];
							document.images["col"+col+"_"+newRow].src = "images/Full/" + colcards[col][newRow] + ".gif";
							++oldRow
							++newRow
						}
						cardPicked = 0;
			//document.form1.cardPickedF.value = 0;
							//document.form1.terminal.value = document.images["col"+cardPickedCol+"_"+cardPickedRow].style.left;
					}
				}
			}
		}
	}
	else if (cardPicked == 2)
	{
		if (colvisibility[col].length == (row + 1))
		{	
			if (colvisibility[col][row] == "true")
			{
				if (checkCards(dealStack[(dealStack.length - 1)],colcards[col][row]))
					{
					newRow = row + 1;
					// move card from dealStack to colcards
					colcards[col].push(dealStack.splice((dealStack.length - 1),1));
					colvisibility[col].push("true");
					document.images[dealPicked].src = "images/spacer.gif";
					document.images[dealPicked].style.left = -200;
					prevRow = newRow -1;
					prevTop = document.images["col"+col+"_"+prevRow].style.top
					newTopSt = prevTop.replace("px","");
					newTop = (Number(newTopSt.valueOf()) + 19) + "px";
					document.images["col"+col+"_"+newRow].style.top = newTop;
					document.images["col"+col+"_"+newRow].style.left = colx[col];
					document.images["col"+col+"_"+newRow].src = "images/Full/" + colcards[col][newRow] + ".gif";
					document.images.ind.src = "images/spacer.gif";
					document.images.ind.style.left = -200;
					topThree();
					cardPicked = 0;
					//document.form1.cardPickedF.value = 0;
				}
			}
		}
	}
//document.form1.terminal.value = "number of cards to move " + moveCards + ":OLD&NEW cols " +cardPickedCol+ "&" + col +":OLD&NEW rows " + cardPickedRow +"&"+ row +":OLD&NEW arrays:" + colcards[cardPickedCol] + "&" + colcards[col] + ":OLD&NEW visibility"+ colvisibility[cardPickedCol] +"&" + colvisibility[col] + document.images["col"+col+"_"+row].src;

//document.form1.terminal.value = dealStack;
}
function checkCards(card1,card2)
{
document.form1.tferin1.value = card1;
card1x = document.form1.tferin1.value;
document.form1.tferin2.value = card2;
card2x = document.form1.tferin2.value;

	if (card2x == "empty")
	{
		if (card1x.substr(0,1) == "K")
		{
			//document.form1.tferout.value = "yes";
			return true;
		}
		else
		{
			//document.form1.tferout.value = "no";
			return false;
		} 
	}
	else
	{
		
		if (card1x.length == 2)
		{
			card1suit = card1x.substr(1,1);
		}
		else if (card1x.length == 3)
		{
			card1suit = card1x.substr(2,1);
		}
		card1value = card1x.replace(card1suit, "");
		if (card2x.length == 2)
		{
			card2suit = card2x.substr(1,1);
		}
		else if (card2x.length == 3)
		{
			card2suit = card2x.substr(2,1);
		}
		card2value = card2x.replace(card2suit, "");
		card1place = "";
		card2place = "";
		for (c=0;c<13;++c)
		{
			if (card1value == valuearray[c])
			{
				card1place = c;
			}
			if (card2value == valuearray[c])
			{
				card2place = c;
			}
		}
		if (card1place == (card2place - 1))
		{
			if (card2suit == "H" || card2suit == "D")
			{
				if (card1suit == "C" || card1suit == "S")
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else if (card2suit == "C" || card2suit == "S")
			{
				if (card1suit == "H" || card1suit == "D")
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}

}
function checkAce(card1,card2,aceCol)
{
	document.form1.tferin1.value = card1;
	card1x = document.form1.tferin1.value;
	document.form1.tferin2.value = card2;
	card2x = document.form1.tferin2.value;
	
	if (card2x == "undefined")
	{
		if (card1x.substr(0,1) == "A")
		{
			return true;
		}
		else
		{
			return false;
		} 
	}
	else
	{
		
	
		if (card1x.length == 2)
		{
			card1suit = card1x.substr(1,1);
		}
		else if (card1x.length == 3)
		{
			card1suit = card1x.substr(2,1);
		}
		card1value = card1x.replace(card1suit, "");
		if (card2x.length == 2)
		{
			card2suit = card2x.substr(1,1);
		}
		else if (card2x.length == 3)
		{
			card2suit = card2x.substr(2,1);
		}
		card2value = card2x.replace(card2suit, "");
		if (card1value == (valuearray[(aceStack[aceCol].length)]))
		{	
			if (card1suit == card2suit)
			{
			
			return true;
			}
			else
			{
			
			return false;
			}
		}
		else
		{
			
			return false;
		}
	}
}
buildfield();

newGame();


<?php
} ?>