<link rel="stylesheet" media="screen" href="css/docs.css" />
<script type="text/javascript" src="js/jquery.itextclear.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="js/jquery.autogrowtextarea.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $('input[type=text]').iTextClear();

    $("#autocomplete").autocomplete(new Array("Core","Selectors","Attributes","Traversing","Manipulation","CSS","Events","Effects","Ajax","Utilities"));

    $("#autotextarea").autoGrow();
});
</script>

<h1 class="page-title">Forms</h1>
<div class="container_12 clearfix">
	<section class="portlet grid_12 leading docs">
		<header>
    		<h2>Forms</h2>
    	</header>
    	<section>
    		<h4>Form general structure</h4>
<pre class="code">
&lt;form class=&quot;form has-validation&quot;&gt;
    &lt;div class=&quot;clearfix&quot;&gt;
        &lt;label for=&quot;form-name&quot; class=&quot;form-label&quot;&gt;Name &lt;em&gt;*&lt;/em&gt;&lt;/label&gt;
        &lt;div class=&quot;form-input&quot;&gt;
            &lt;input type=&quot;text&quot; id=&quot;form-name&quot; name=&quot;name&quot; required=&quot;required&quot; placeholder=&quot;Enter your name&quot; /&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;form-action clearfix&quot;&gt;
        &lt;button class=&quot;button&quot; type=&quot;submit&quot;&gt;OK&lt;/button&gt;
        &lt;button class=&quot;button&quot; type=&quot;reset&quot;&gt;Reset&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;
</pre>
			<p>Class "has-validation" enables validation on form inputs. Below form is the result of the above html code. </p>
			<form class="form has-validation">
				<div class="clearfix">
                    <label for="form-name" class="form-label">Name <em>*</em></label>
                    <div class="form-input"><input type="text" id="form-name" name="name" required="required" placeholder="Enter your name" /></div>
                </div>
                <div class="form-action clearfix">
					<button class="button" type="submit">OK</button>
					<button class="button" type="reset">Reset</button>
				</div>
             </form>
             
             <p class="title">Input properties:</p>
             
             <table class="basic-table">
				<thead>
					<tr>
						<th style="width:100px">Property</th>
						<th>Values</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>type</td>
						<td>text|email|date|password|url|file|checkbox|radio|submit|reset <span class="code">type=&quot;text&quot;</span></td>
						<td>This attribute specifies the type of control to create. The default value for this attribute is "text".</td>
					</tr>
					<tr>
						<td>name</td>
						<td>[user-defined] <span class="code">name=&quot;form-name&quot;</span></td>
						<td>This attribute assigns the control name.</td>
					</tr>
					<tr>
						<td>id</td>
						<td>[user-defined] <span class="code">id=&quot;name&quot;</span></td>
						<td>This attribute assigns the control id.</td>
					</tr>
					<tr>
						<td>required</td>
						<td>required <span class="code">required=&quot;required&quot;</span></td>
						<td>This means that the value should not be empty.</td>
					</tr>
					<tr>
						<td>placeholder</td>
						<td>[user-defined] <span class="code">placeholder=&quot;Enter your name&quot;</span></td>
						<td>Serve as additional info. Placeholder text is text that appears inside of a form input when the page loads, but disappears when the user places the cursor in that form input.</td>
					</tr>
					<tr>
						<td>maxlength</td>
						<td>[number]</td>
						<td>When the type attribute has the value "text" or "password", this attribute specifies the maximum number of characters the user may enter.</td>
					</tr>
					<tr>
						<td>data-equals</td>
						<td>[name of another control] <span class="code">data-equals=&quot;password&quot;</span></td>
						<td>Will validate if the text matches the specified textfield. (as seen in Re-enter password)</td>
					</tr>
				</tbody>
			</table>
			<p>* Form will automatically check for valid email, date and url.</p>
			<p>* Form will check empty required input or invalid data input, hence it will show error message.</p>
			
			<h4>Custom Form elements</h4>
			<p>Basic HTML Code:</p>
<pre class="code">
&lt;input type=&quot;text&quot; id=&quot;form-name&quot; name=&quot;name&quot; /&gt;
</pre>	

			<p>To make the textfield clearable, add below javascript code:</p>
<pre class="code">
$(&quot;input[type=text]&quot;).iTextClear();
</pre>	
			<p>Specify placeholder attribute to add placeholder text</p>
<pre class="code">
&lt;input type=&quot;text&quot; id=&quot;form-name&quot; name=&quot;name&quot; placeholder=&quot;Enter your name&quot; /&gt;
</pre>			
			<p>To get tooltip, add "has-tooltip" class and specify title attribute</p>
<pre class="code">
&lt;input type=&quot;text&quot; id=&quot;form-name&quot; name=&quot;name&quot; placeholder=&quot;Enter your name&quot; 
	title=&quot;This is a sample tooltip&quot; class=&quot;has-tooltip&quot;/&gt;
</pre>			
			<p>The above codes will output below textfield:</p>
			<form class="form">
				<div class="clearfix">
                    <label for="form-name" class="form-label">Name</label>
                    <div class="form-input"><input type="text" id="form-name" name="name" placeholder="Enter your name" title="This is a sample tooltip" class="has-tooltip"/></div>
                </div>
             </form>
			
			<p class="title">Autocomplete Textfield</p>
			<p>Autocomplete feature is important when typing for a very long words. It also decreases the amount of time spent typing words.</p>
			<p>To add autocomplete in textfield, use the following javascript:</p>			
<pre class="code">
$(&quot;#autocomplete&quot;).autocomplete(data-source);
</pre>
			<p>Sample usage:</p>
			<p>data-source = array("Core","Selectors","Attributes","Traversing","Manipulation","CSS","Events","Effects","Ajax","Utilities")</p>
			<form class="form">
				<div class="clearfix">
					<label for="autocomplete" class="form-label">Autocomplete</label>
					<div class="form-input"><input type="text" id="autocomplete" /></div>
				</div>
			</form>
			
			<p class="title">Autoresize Textarea</p>
			<p>We use auto grow textarea for sites needing large user input. Auto resize or autogrow textarea will grow vertically as it becomes full.</p>
			<p>To enable autogrow textarea, add the following javascript:</p>
<pre class="code">
$(&quot;#autotextarea&quot;).autoGrow();
</pre>		
			<p>Sample usage:</p>
			<form class="form">
				<div class="clearfix">
					<label for="autotextarea" class="form-label">Autoresize Textarea</label>
					<div class="form-input form-textarea"><textarea id="autotextarea" rows="5"></textarea></div>
				</div>
			</form>
			<p>Check on some other custom form element on forms2.php</p>
		</section>
	</section>
</div>
