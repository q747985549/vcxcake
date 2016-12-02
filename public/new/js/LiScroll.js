function ScrollBox(Box) {
	this.Box = $("#" + Box);
	this.Name = "Li���ҹ�����";
	this.Author = "Keboy";
	this.Version = "v1.0";
	this.CreateDate = "2009-12-15";
}
ScrollBox.prototype = {
	ClientWidth: 0,
	Space: 0,
	Step: 0,
	DefStep: 0,
	Speed: 0,
	Forward: "",
	NoRecord: "",
	Control: false,
	CtrlClass: "",
	Stop: true,
	DefaultHtml: "",
	DefaultI: 1,
	GoCross: 0,
	CtrlSpeed: 0,
	Default: function() {
		var _this = this;
		this.DefaultHtml = this.Box.find("ul:first").html();
		this.DefStep = this.Step;
		this.Box.css("overflow","hidden").find("li").each( function() {
			_this.GoCross += ( $(this).get(0).offsetWidth + _this.Space );
		} );
		this.SetDefault();
	},
	SetDefault: function() {
		var _this = this;
		var li = this.Box.find("li");
		if ( li.length > 0 ) {
			var LiWidth = 0;
			li.each( function() {
				LiWidth += ( $(this).get(0).offsetWidth + _this.Space );
			} );
			if ( LiWidth >= 2 * this.ClientWidth ) {
				var endHTML = this.Box.find("ul:first").html();
				endHTML += endHTML;
				this.Box.find("ul:first").html(endHTML).css("width",LiWidth * 2 + "px");
				this.Start();
			}
			else {
				var newHTML = "";
				for ( var i = 0 ; i < this.DefaultI ; i++ ) {
					newHTML += this.DefaultHtml;
				}
				this.DefaultI++;
				this.Box.find("ul:first").html(newHTML);
				this.SetDefault();
			}
		}
		else {
			this.Box.find("ul:first").html(this.NoRecord);
		}
	},
	Start: function() {
		var _this = this;
		var mar = setInterval(GetScroll,this.Speed);
		function GetScroll() {
			if ( _this.Forward == "left" ) {
				if ( _this.Box.get(0).scrollLeft > _this.GoCross ) {
					_this.Box.get(0).scrollLeft -= _this.GoCross;
				}
				else {
					_this.Box.get(0).scrollLeft += _this.Step;
				}
			}
			else if ( _this.Forward == "right" ) {
				if ( _this.Box.get(0).scrollLeft <= 0 ) {
					_this.Box.get(0).scrollLeft += _this.GoCross;
				}
				else {
					_this.Box.get(0).scrollLeft -= _this.Step;
				}
			}
		}
		if ( this.Control ) {
			$("." + this.CtrlClass).css("cursor","pointer");
			$("." + this.CtrlClass + ":first").mouseover( function() {
				_this.Forward = "left";
			} ).mousedown( function() {
				_this.Step = _this.DefStep * _this.CtrlSpeed;
			} );
			$("." + this.CtrlClass + ":last").mouseover( function() {
				_this.Forward = "right";
			} ).mousedown( function() {
				_this.Step = _this.DefStep * _this.CtrlSpeed;
			} );
			$(document).mouseup( function() {
				_this.Step = _this.DefStep;
			} );
		}
		if ( this.Stop ) {
			this.Box.mouseover( function() {
				clearInterval(mar);
			} ).mouseout( function() {
				mar = setInterval(GetScroll,_this.Speed);
			} );
		}
	}
};