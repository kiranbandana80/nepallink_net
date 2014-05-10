<?php
/***********************************************************************
| Developed by 68 Designs, LLC
|-----------------------------------------------------------------------
| All source code & content (c) Copyright 2006, 68 Designs, LLC
|   unless specifically noted otherwise.
|
|The contents of this file are protect under law as the intellectual property
| of 68 Designs. Any use, reproduction, disclosure or copying
| of any kind without the express and written permission of 68 Designs is forbidden.
|
| @version $Revision: 1.3 $
| @package 68KB
| ______________________________________________________________________
|	http://www.68kb.com
***********************************************************************/

define("LANG_SUPPORT", "Support Center");
//date
define("LANG_DATE_BRIEF",'%B %e, %Y'); // short date
define("LANG_DATE_LONG",'%A, %B %e, %Y'); // long date Wednesday, February 16, 2005
define("LANG_DATE_TIME",'%D %H:%M:%S'); //date time  05/12/05 12:01:34

//search
define("LANG_SEARCH", "Search");
define("LANG_SEARCH_RESULTS", "Search Results");
define("LANG_HELP_CENTER", "Help Center");
define("LANG_SEARCH_HELP_CENTER", "Search Help Center");

//email an article
/* available variables
	*	##to_name## - the to name
	* 	## to_email## - the to email
	*	##from_name## - the from name
	*	##from_email## - the from email
	*	##url## - the url or link to the article
*/
define("LANG_EMAIL_SUBJECT", "Knowledgebase article ##from_name## thought you would like.");
define("LANG_EMAIL_BODY", "Your friend ##from_name## thought you would be interested in this knowledge base article ##url##.");
define("LANG_EMAIL_SENT", "Your email has been sent!");

//navigation
define("LANG_NAVIGATION", "Navigation");
define("LANG_HOME", "Home");
define("LANG_CONFIGURATION", "Configuration");
define("LANG_MANAGE_USERS", "Users");
define("LANG_MANAGE_CATS", "Categories");
define("LANG_MANAGE_ARTICLES", "Articles");
define("LANG_MANAGE_GLOSSARY", "Glossary");
define("LANG_MANAGE_STATS", "Statistics");
define("LANG_MANAGE_COMMENTS", "Comments");

//general
define("LANG_SUBMIT", "Submit");
define("LANG_EDIT", "Edit");
define("LANG_ADD", "Add");
define("LANG_YES", "Yes");
define("LANG_NO", "No");
define("LANG_TITLE", "Title");
define("LANG_DISPLAY", "Display");
define("LANG_MODIFY", "Modify");
define("LANG_DELETE", "Delete");
define("LANG_APPROVE", "Approve");
define("LANG_ADD_NEW", "Add New");

//login
define("LANG_WELCOME", "Welcome");
define("LANG_LOGIN", "Login");
define("LANG_LOGOUT", "Log Out");
define("LANG_LOST_PASSWORD", "Lost Password");
define("LANG_USERNAME", "Username");
define("LANG_PASSWORD", "Password");
define("LANG_RETYPE_PASSWORD", "Retype Password");
define("LANG_RETYPE_PASSWORD_TXT", "Enter password twice.");
define("LANG_REMEBER", "Remember");
define("LANG_LOGIN_ERROR", "I am sorry your username or password is incorrect.");

//user
define("LANG_FULL", "Full");
define("LANG_NAME", "Name");
define("LANG_EMAIL", "Email");
define("LANG_OPTIONAL", "Optional");
define("LANG_USERS", "Users");

//comments
define("LANG_APPROVED", "Approved");
define("LANG_DATE_ADDED", "Date Added");
define("LANG_NEW_COMMENTS_SUBJECT", "New comments where added to your knowledge base");
define("LANG_NEW_COMMENTS_MSG", "New comments where added to your knowledge base.  Please visit your administration to view the comments.");
define("LANG_NO_COMMENTS", "No visitors have commented.");
define("LANG_THANKS_COMMENTS", "Thank you for submitting your comment. All comments must be manually approved before they are seen on the site.");

//categories
define("LANG_MAIN_CATS", "Main Categories");
define("LANG_SUB_CATS", "Sub Categories");
define("LANG_CATS", "Categories");
define("LANG_CATEGORY", "Category");
define("LANG_DESCRIPTION", "Description");
define("LANG_PARENT", "Parent");
define("LANG_ORDER", "Order");
define("LANG_SORRY_NO_ARTICLES", "We are sorry but this category doesn't have any articles.");

//glossary
define("LANG_LOOKUP_TERM", "Look Up Terminology");
define("LANG_GLOSSARY", "Glossary");
define("LANG_DEFINITION", "Definition");

//problem solution
define("LANG_LATEST_ARTICLES", "Latest Articles");
define("LANG_ARTICLE", "Article");
define("LANG_ARTICLES", "Articles");
define("LANG_PROBLEM", "Problem");
define("LANG_SOLUTION", "Solution");
define("LANG_ADDED_ON", "Added on");
define("LANG_VIEWED", "Viewed");
define("LANG_TIMES", "times");
define("LANG_PRINT", "Print");
define("LANG_EMAIL", "Email");
define("LANG_SOLUTION", "Solution");
define("LANG_ADD_TO_FAVORITES", "Add to favorites");
define("LANG_COMMENTS", "Comments");
define("LANG_LEAVE_COMMENTS", "Please leave your comments");
define("LANG_DATE_ADDED", "Date Added");
define("LANG_NEXT_ARTICLE", "Next");
define("LANG_PREVIOUS_ARTICLE", "Previous");

//attachments
define("LANG_ADD_FILES", "Add Attachments");
define("LANG_ATTACHMENT", "Attachment");
define("LANG_ATTACHMENTS", "Attachments");

//previous next
define("LANG_FIRST", "<strong>&laquo;</strong> First");
define("LANG_NEXT", "&gt;");
define("LANG_PREVIOUS", "&lt;");
define("LANG_LAST", "Last <strong>&raquo;</strong>");
define("LANG_SHOWING_PAGE", "Showing page");
define("LANG_OF", "of");

//rating
define("LANG_HELPFUL", "This answer was helpful");
define("LANG_NOT_HELPFUL", "This answer was not helpful");

//stats
define("LANG_QUICK_STATS", "Quick Stats");
define("LANG_TOTAL", "Total");
define("LANG_MOST_VIEWED", "Most Viewed Articles");

//forward
define("LANG_THANKS", "Thank You!");
define("LANG_FORWARD", "Please wait while you are forwarded...");
define("LANG_FORWARD_IF_NOT", "If this does not happen automatically please");
define("LANG_FORWARD_CLICK_HERE", "click here");
define("LANG_ERROR", "Error!");
define("LANG_ERROR_MSG", "We are sorry an occured please hit the browsers back button.");

//errors
define("LANG_EMAIL_ERROR", "We are sorry, an error occured trying to send an email.");

//modules
define("LANG_ADMIN_MODULE_MANAGE", "Modules");
define("LANG_ADMIN_DIRECTORY", "Directory");
define("LANG_ADMIN_VERSION", "Version");
define("LANG_ADMIN_ACTIONS", "Actions");
define("LANG_ADMIN_HELP", "Help");
define("LANG_ADMIN_REGENERATE", "Regenerate");
define("LANG_ADMIN_REGENERATE_SUCCESS", "Modules list regenerated from file system");
define("LANG_ADMIN_MODULE_NAME", "Module Name");
define("LANG_ADMIN_MODULE_ACTIVE", "Active");
define("LANG_ADMIN_MODULE_INACTIVE", "Inactive");
define("LANG_ADMIN_MODULE_UNINITIALIZED", "Uninitialized");
define("LANG_ADMIN_MODULE_INITIALIZE", "Initialize");
define("LANG_ADMIN_MODULE_ACTIVATE", "Activate");
define("LANG_ADMIN_MODULE_DEACTIVATE", "Deactivate");
define("LANG_ADMIN_MODULE_DELETECONFIRM", "Remove module and drop related database fields and tables?");
define("LANG_ADMIN_NO_MODULE", "This module does not have an administration section.");
define("LANG_ADMIN_STATE", "State");
define("LANG_ADMIN_MANAGE", "Manage");

//Tempaltes
define("LANG_ADMIN_EDITOR", "Template Editor");
define("LANG_ADMIN_CHMOD_ERROR", "In order to edit this file please make it writable.");

//Javascript
define("LANG_JAVASCRIPT_PLEASE_ENTER", "Please enter a value in the field");
?>