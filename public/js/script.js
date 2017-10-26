
	$(document).ready(function(){
		first();                   // เมื่อ page ถูกโหลดจะทำฟังก์ชัน first ก่อน
		$('#btnAdd').click(first); // เมื่อ click จะสร้าง element ขึ้นมาใหม่(สร้างอินพุตใหม่)
		$('#btnSend').click(send); //เมื่อคลิกจะทำฟังก์ชัน send
		
	});
	
	function first(){

		var id = $('#cover div').length+1;            // นับว่ามี tag div กี่อันแล้ว แล้ว +1
		var wrapper = $("<div id=\"field"+id+"\">");  // สร้าง div
		var parag   = $("<p>รหัสนักศึกษา\""+id+"\"</p>");   // สร้าง p
		var text    = $("<div class='col-xs-2'><input type='text' class='form-control' name=\"tel"+id+"\" /></div>"); // สร้าง input
		var btnDel  = $("<input type='button' class='btn btn-default' value='ยกเลิก' id=\"btn"+id+"\"/>"); 
		var br   = $("<br><br>"); // สร้าง input
		
	
		

		btnDel.click(function(){
			$(this).parent().remove();			
		});
		
		// wrapper.append(parag);  
		wrapper.append(text);
		wrapper.append(btnDel);
		wrapper.append(br);
		$('#cover').append(wrapper);
	}
	
	function send(){  //นับ div ทั้งหมดก่อนส่ง
		var id= $('#cover div').length;
		var hiddens = $("<input type='hidden' name='hidden' value=\""+id+"\"/>");
	
		$('form').append(hiddens);
		$('form').submit(); 
	}
