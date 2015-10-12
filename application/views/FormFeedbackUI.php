<!--
author: Syifa Khairunnisa
editor: Khusna Nadia

Menampilkan form isian membuat feedback di halaman Contact Us
-->

<div class="container-fluid">
	<div class="row">
		<header class="headersmall">
			<div class="title">
				<div class="tuffyh1a">Contact Us</div>
			</div>
		</header>

		<ul class="subtitle nav navbar-nav">
			<li><p>Send Us a Message</p></li>
			<li><p>Contact Information</p></li>
		</ul>

		<div class="col-lg-12 even">
			<div class="col-lg-1"></div>
			<div class="contactus col-lg-5">
			<?php 
			$attributes = array('id' => 'formfeedback');
			echo form_open('contactus/send', $attributes); ?>
				<div class="contact form-group">
				  <div class="col-lg-11">
					<label class="control-label">Name <span class="req">*</span></label>
					<?php echo form_error('name'); ?>
					<?php echo form_input(array('id' => 'name', 'name' => 'name', 'class' => 'form-control', 'required' => 'required')); ?>
			      </div>
			    </div>
				<br><br>
			    <div class="contact form-group">
				  <div class="col-lg-11">
					<label class="control-label">Email <span class="req">*</span></label>
					<?php echo form_error('email'); ?>
					<?php echo form_input(array('id' => 'email', 'name' => 'email', 'class' => 'form-control', 'required' => 'required', 'type' => 'email')); ?>
			      </div>
			    </div>
			    <br><br>
			    <div class="contact form-group">
				  <div class="col-lg-11">
					<label class="control-label">Subject</label>
					 <?php echo form_error('subject'); ?>
					 <?php echo form_input(array('id' => 'subject', 'name' => 'subject', 'class' => 'form-control')); ?>
 				  </div>
			    </div>
			    <br><br>
			    <div class="contact form-group">
				  <div class="col-lg-11">
					<label class="control-label">Message <span class="req">*</span></label>
					<?php echo form_error('message'); ?>
					<?php echo form_textarea(array('id' => 'message', 'name' => 'message', 'class' => 'form-control', 'rows' => '3', 'required' => 'required')); ?>
 				  </div>
			    </div>
			    <br>
			    <button class="btn btn-warning" id="submitmsg" name="submitmsg" type="submit">SEND</button>
			    <?php echo form_close(); ?>
			</div>
			<div class="contactus col-lg-5">
				<div class="contactinfo">
				<b>JAKTrip: Explore fun places within your budget in Jakarta</b><br>
				Crafted by A10<br>
				Faculty of Computer Science, University of Indonesia<br><br>
				
				<a href="mailto:amad.ibra@gmail.com">Ahmad Ibrahim</a> as Project Manager<br>
				<a href="mailto:fakhirah.dg@gmail.com">Fakhirah Dianah G.</a> as System Analyst<br>
				<a href="mailto:khusnanadia@gmail.com">Khusna Nadia</a> as Database Designer<br>
				<a href="mailto:mohammad.syahid.wildan@gmail.com">M. Syahid Wildan</a> as Lead Programmer<br>
				<a href="mailto:syifa.kha@gmail.com">Syifa Khairunnisa</a> as Front-End Developer
				</div>
			</div>
			<div class="contactus col-lg-1"></div>
			</div>
		
</div>

</div>
	
<?php
	if($this->session->flashdata('form')) {
	  $msg = $this->session->flashdata('form');
	  $message = $msg['message'];
	  echo "<script>$(document).ready(function(){notif('".$message."');});</script>";
	}
?>