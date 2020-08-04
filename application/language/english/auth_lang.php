<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Please login with your email/username and password below.';
$lang['login_identity_label']  = 'Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Remember Me:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Forgot your password?';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'Below is a list of the users.';
$lang['index_fname_th']          = 'First Name';
$lang['index_lname_th']          = 'Last Name';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Active';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_create_user_link']  = 'Create a new user';
$lang['index_create_group_link'] = 'Create a new group';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Create User';
$lang['create_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'First Name:';
$lang['create_user_lname_label']                       = 'Last Name:';
$lang['create_user_company_label']                     = 'Company Name:';
$lang['create_user_identity_label']                    = 'Identity:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Confirm Password:';
$lang['create_user_submit_btn']                        = 'Submit';
$lang['create_user_validation_fname_label']            = 'First Name';
$lang['create_user_validation_lname_label']            = 'Last Name';
$lang['create_user_validation_identity_label']         = 'Identity';
$lang['create_user_validation_email_label']            = 'Email Address';
$lang['create_user_validation_phone_label']            = 'Phone';
$lang['create_user_validation_company_label']          = 'Company Name';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone_label']            = 'Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_identity_label'] = 'Identity';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';
$lang['forgot_password_identity_not_found']         = 'No record of that username.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

//Create Agent
$lang['create_agent_heading']  								  = 'Create Agent';
$lang['create_agent_subheading']                              = 'Please enter the agent\'s information below.';
$lang['upload_agent_photo']                                   = 'Please upload the agent\'s profile picture.';
$lang['create_agent_logout_btn']                              = 'Logout';
$lang['index_create_agent_link']                              = 'Create a new agent';
$lang['create_agent_ssn']                                     = 'Identification Number';
$lang['create_agent_profile_picture']                         = 'Upload profile picture';
$lang['create_agent_validation_ssn_label']                    = 'Identification Number';
$lang['create_agent_validation_profile_picture_label']        = 'Profile Picture';
$lang['create_select_identification_type']                    = 'Select Idenfication type';
$lang['new_index_heading']                                    = 'Agents';
$lang['new_index_subheading']                                 = 'Below is a list of Agents';

//agent details
$lang['index_profile_picture']                                = 'Profile Picture';
$lang['index_first_name']                                     = 'First Name';
$lang['index_second_name']                                    = 'Second Name';
$lang['index_email']                                          = 'Email';
$lang['index_phone_number']                                   = 'Phone Number';
$lang['index_identification_type']                            = 'Identification Type';
$lang['index_identification_number']                          = 'Idenfitication Number';
$lang['index_activate']                                       = 'Activate';
$lang['index_truck_owners']                                   = 'View truck owners';

$lang['edit_agent_heading']                                    = 'Edit Agent Details';
$lang['edit_agent_subheading']                                 = 'Please enter agent information below';

//truck owners
$lang['new_towner_heading']                                    = 'Truck Owners';
$lang['new_towner_subheading']                                 = 'Below is a list of truck owners';
$lang['towner_index_profile_picture']                                = 'Profile Picture';
$lang['towner_index_first_name']                                     = 'First Name';
$lang['towner_index_second_name']                                    = 'Second Name';
$lang['towner_index_email']                                          = 'Email';
$lang['towner_index_phone_number']                                   = 'Phone Number';
$lang['towner_index_identification_type']                            = 'Identification Type';
$lang['towner_index_identification_number']                          = 'Idenfitication Number';
$lang['towner_index_company']                                        = 'Company';
$lang['towner_index_position']                                       = 'Position';
$lang['towner_index_activate']                                       = 'Activate';
$lang['index_truck_owners']                                          = 'View truck owners';

$lang['towner_individuals']                                          = 'Personal';
$lang['towner_company']                                              = 'Company';
$lang['towner_all']                                                  = 'All';


//edit truck owner details
$lang['edit_towner_heading']                                        = 'Edit truck owner';
$lang['edit_towner_subheading']                                     = 'edit truck owner';

//trucks
$lang['title_truck_owner_heading']                                  = 'Trucks for ';
$lang['title_truck_owner_subheading']                               = 'List of trucks for';
$lang['truck_image']                                                = 'Truck front image';
$lang['truck_numberplate']                                          = 'Truck number plate';
$lang['truck_model']                                                = 'Truck model';
$lang['truck_description']                                          = 'Truck Description';

$lang['index_view_list_agents']                                     = 'View list of agents';
$lang['index_view_truck_categories']                                = 'View truck categories';
$lang['truck_category_heading']                                     = 'Truck Categories';
$lang['truck_category_subheading']                                  = 'List of categories';

//table
$lang['truck_category_id']                                          = 'Id';
$lang['truck_category_name']                                        = 'Category';
$lang['truck_category_image']                                       = 'Image';

$lang['add_truck_category_heading']                                 = 'Add truck category';
$lang['add_truck_category_subheading']                              = 'Choose image and put category name';

$lang['add_category_truck_real_image']                              = 'Please add category truck real image';
$lang['add_category_truck_animated_image']                          = 'Please add category truck animated image';
$lang['add_category_truck_name']                                    = 'Category Name:';
$lang['add_category_truck_submit']                                  = 'Add truck';

//truck categories
$lang['add_category']                                               = 'Add Truck Category';







                                     

