<?php include 'header.php';?>
<link type="text/css" href="<?php echo base_url('static/syntaxhighlighter/styles/shCore.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('static/syntaxhighlighter/styles/shThemeDefault.css');?>" rel="stylesheet" />
	<div id="main">
		<div id="question-header">
			<h1 itemprop="name"><a class="question-hyperlink" href="/codes/<?php echo $code['id'];?>/<?php echo $title;?>"><?php echo $title;?></a></h1>
		</div>
		<div id="mainbar">
			<div id="post-text">
			<?php echo $code['content'];?>
			</div>
			<div style="margin-top: 20px;">
				<p class="label-key r">
		        	<a href="/u/<?php echo $code['userid'];?>"><?php echo $code['username'];?></a> 
		        	发表于 <span style="font-weight: bold"><?php echo $code['ctime'];?></span>
		        </p>
		        <?php if($code['userid'] == $account['id']):?>
				<div class="post-menu l">
					<a  href="/codes/edit/<?php echo $code['id'];?>">修改</a>
					<span class="lsep">|</span>
					<a href="/codes/delete/<?php echo $code['id'];?>">删除</a>
				</div>
				<?php endif;?>
			</div>
			
		</div>
		<div id="sidebar">
			<div class="module question-stats">
		        <p class="label-key">标签</p>
		        <div style="margin-top:10px;">
		        	<?php foreach ($code['tags'] as $tag):?>
			        <a href="/tag/<?php echo $tag;?>" class="xwj"><?php echo $tag;?></a>
			        <?php endforeach;?>
		        </div>
		        <div class="cbt"></div>
		        <div class="line"></div>
		    </div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('static/syntaxhighlighter/scripts/shCore.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('static/syntaxhighlighter/scripts/shAutoloader.js');?>"></script>
	<script type="text/javascript">
		SyntaxHighlighter.autoloader(
			  'applescript            <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushAppleScript.js',
			  'actionscript3 as3      <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushAS3.js',
			  'bash shell             <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushBash.js',
			  'coldfusion cf          <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushColdFusion.js',
			  'cpp c                  <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushCpp.js',
			  'c# c-sharp csharp      <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushCSharp.js',
			  'css                    <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushCss.js',
			  'delphi pascal          <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushDelphi.js',
			  'diff patch pas         <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushDiff.js',
			  'erl erlang             <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushErlang.js',
			  'groovy                 <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushGroovy.js',
			  'java                   <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushJava.js',
			  'jfx javafx             <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushJavaFX.js',
			  'js jscript javascript  <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushJScript.js',
			  'perl pl                <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushPerl.js',
			  'php                    <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushPhp.js',
			  'text plain             <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushPlain.js',
			  'py python              <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushPython.js',
			  'ruby rails ror rb      <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushRuby.js',
			  'sass scss              <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushSass.js',
			  'scala                  <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushScala.js',
			  'sql                    <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushSql.js',
			  'vb vbnet               <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushVb.js',
			  'xml xhtml xslt html    <?php echo base_url('static/syntaxhighlighter/scripts/');?>/shBrushXml.js'
		);
		SyntaxHighlighter.all();
	</script>
<?php include 'footer.php';?>