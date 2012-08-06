<?php include 'header.php';?>
	<div id="main">
		<div id="mainbar">
			<?php echo form_open('codes/add') ?>
				<input type="hidden" value="submitted" name="submitted"/>
				<div class="form-item ask-title">
		            <table class="ask-title-table">
		                <tbody><tr>
		                    <td class="ask-title-cell-key">
		                        <label for="title">标题</label>
		                    </td>
		                    <td class="ask-title-cell-value">
		                        <input type="text" value="<?php echo $code_title;?>" class="ask-title-field" tabindex="100" maxlength="300" name="title" style="opacity: 1;">                        
		                    </td>
		                </tr>
		            </tbody></table>
		        </div>
		        <div class="post-editor form-item">
		        	<label>内容</label>
		        	<textarea id="elm1" name="content" tabindex="101" rows="15" cols="92"><?php echo $content;?></textarea>
		        </div>
		        <div class="form-item">
				    <label>标签</label>
				    <input type="text" tabindex="103" value="<?php echo $tag;?>" size="60" name="tag" id="tagnames" style="width:663px;">
				    <br>
					<span class="edit-field-overlay">以空格区分，至少一个标签如(php python),最多5个</span>
				</div>
				<div class="form-submit cbt">
                	<input type="submit" tabindex="120" value="提交案例" id="submit-button">
            	</div>
            	<?php
				if (!empty($error)) {
					echo '<div class="error">'.$error.'</div>';
				}
				?>
			</form>
		</div>
		<div id="sidebar" class="ask-sidebar">
			<div id="scroller" style="position: relative;">
				<div class="module newuser sidebar-help">
					<h4 style="font-size: 18px;padding-top:5px;">帮助</h4>
					<br>
					<p>如何使代码高亮？</p>
					<br>
					<p>在源码模式下，给代码加上<br>&lt;pre class="brush:php"&gt;代码&lt;/pre&gt;</p>
					<p>可用brush字段值如下：</p>
					<p>applescript actionscript3 as3 coldfusion cf cpp c c# c-sharp csharp css delphi pascal diff patch pas
					erl erlang groovy java jfx javafx js jscript javascriptperl pl php text plain py python ruby rails ror rb
					sass scss scala sql vb vbnet xml xhtml xslt html</p>
					<a title="点击看大图" href="<?php echo base_url('static/images/2.png');?>"><img alt="" src="<?php echo base_url('static/images/2.png');?>" width="270px;"></a>
					<br><br>
					<p>也可以使用编辑器的插入代码功能：</p>
					<img alt="" src="<?php echo base_url('static/images/1.png');?>">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('static/xheditor/jquery-1.4.4.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('static/xheditor/xheditor-1.1.14-zh-cn.min.js');?>"></script>
	<script type="text/javascript">
		var allPlugin={
			Code:{c:'btnCode',t:'插入代码',h:1,e:function(){
				var _this=this;
				var htmlCode='<div><select id="xheCodeType"><option value="html">HTML/XML</option><option value="js">Javascript</option><option value="css">CSS</option><option value="php">PHP</option><option value="java">Java</option><option value="py">Python</option><option value="pl">Perl</option><option value="rb">Ruby</option><option value="cs">C#</option><option value="c">C++/C</option><option value="vb">VB/ASP</option><option value="">其它</option></select></div><div><textarea id="xheCodeValue" wrap="soft" spellcheck="false" style="width:300px;height:100px;" /></div><div style="text-align:right;"><input type="button" id="xheSave" value="确定" /></div>';			var jCode=$(htmlCode),jType=$('#xheCodeType',jCode),jValue=$('#xheCodeValue',jCode),jSave=$('#xheSave',jCode);
				jSave.click(function(){
					_this.loadBookmark();
					_this.pasteHTML('<pre class="brush:'+jType.val()+'">'+_this.domEncode(jValue.val())+'</pre>');
					_this.hidePanel();
					return false;	
				});
				_this.saveBookmark();
				_this.showDialog(jCode);
			}}
		};
		$('#elm1').xheditor({tools:'mfull',width:'670',plugins:allPlugin});
	</script>
<?php include 'footer.php';?>