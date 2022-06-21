var board = {
	writeBoard: function(){
		var st = '';
		st = '<table id="board-table"><tbody>';
		for(var i=0; i < currGame.noOfRow; i++){
			st += '<tr>';
			for(var j=0; j < currGame.noOfCol; j++){
				st += '<td class="square" id="s'+String('00' + i).slice(-2)+String('00' + j).slice(-2)+'" onclick="board.sqClick(' + i + ',' + j + ' )"></td>';
			};
			st += '</tr>';
		}
		st+= '</tbody></table>';
		document.getElementById('board').innerHTML = st;
		for(var i=0; i < currGame.noOfRow; i++){
			for(var j=0; j < currGame.noOfCol; j++){
				board.sqUpdate(i,j);
			}
		}
	},
	sqUpdate: function(i,j){
		var scrX = document.getElementById('img_x').value;
		var scrO = document.getElementById('img_o').value;
		var OHtml='<img src="'+scrX+'">';
		var XHtml='<img src="'+scrO+'">';



		if (currGame.sq[i][j] == O){
			document.getElementById('s'+String('00' + i).slice(-2)+String('00' + j).slice(-2)+'').innerHTML = OHtml;
		} else if (currGame.sq[i][j] == X){
			document.getElementById('s'+String('00' + i).slice(-2)+String('00' + j).slice(-2)+'').innerHTML = XHtml;
		} else {
			document.getElementById('s'+String('00' + i).slice(-2)+String('00' + j).slice(-2)+'').innerHTML = '';
		}
	},
	sqMouseOver: function(row, col) {
		var scrX = document.getElementById('img_x').value;
		var scrO = document.getElementById('img_o').value;
		if (currGame.isGamming && currGame.sq[row][col] == 0 && currGame.Turn == X) {
			var HTML='<img style="opacity: 0.5" src="'+scrX+'">';
			document.getElementById('s'+String('00' + row).slice(-2)+String('00' + col).slice(-2)+'').innerHTML = HTML;
		}
	},
	/* when click a currGame.square */
	//const X = 1, O = 2, Empty = 0;
	sqClick: function(row, col) {
		if(!currGame.isGamming || currGame.sq[row][col] !== 0) return

		if (playWithComputer && currGame.Turn === X) return currGame.AIMove(row, col); //chơi với máy

		currGame.userMove(row,col,currGame.Turn)
	},
};
