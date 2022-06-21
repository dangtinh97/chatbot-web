var ctrl = {
	newGame : function() {
		referee.alertBoard("")
		currGame = new game(16, 16);
		currGame.isGamming = playWithComputer
		board.writeBoard();
	},
	undo : function() {
		referee.alertBoard('Chơi với máy đã gà thế này rồi nên không có chơi lại nha! :D :D ',2 );
	},
	resign : function() {
		if(!currGame.isGamming) return;
		referee.alertBoard('Bạn đã chịu thua. :D :D');
		currGame.isGamming = false;
	},
	standUp : function() {
		var bestMove = {}
		if (currGame.Turn === X) {
			bestMove = {row: 0, col:0};
			AIthink(X, bestMove);
			currGame.sq[bestMove.row][bestMove.col] = X;
			board.sqUpdate(bestMove.row, bestMove.col);
			referee.checkWin();
			currGame.Turn = O;
			currGame.noOfPiece++;
		} else {
			bestMove = {row:0, col:0};
			AIthink(O, bestMove);
			currGame.sq[bestMove.row][bestMove.col] = O;
			board.sqUpdate(bestMove.row, bestMove.col);
			referee.checkWin();
			currGame.Turn = X;
			currGame.noOfPiece++;
		}
	},
	playWithComputer:function (){
		if(playWithComputer) return;
		playWithComputer = true;
		setButtonLight('play_with_computer',true)
		setButtonLight('play_with_user',false)
		this.newGame()
	},
	playWithUser:function (){
		if(!playWithComputer) return;
		playWithComputer = false;
		setButtonLight('play_with_computer',false)
		setButtonLight('play_with_user',true)
		this.newGame()
		currGame.isGamming = false;
	}

};
