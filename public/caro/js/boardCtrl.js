var ctrl = {
	newGame : function() {
		referee.alertBoard("")
		currGame = new game(16, 16);
		board.writeBoard();
	},
	undo : function() {
		referee.alertBoard('Chơi với máy đã gà thế này rồi nên không có chơi lại nha! :D :D ',2 );
	},
	resign : function() {
		referee.alertBoard('Bạn đã chịu thua. :D :D');
		currGame.isGamming = false;
	},
	standUp : function() {
		var bestMove = {}
		if (currGame.Turn == X) {
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
	}
};
