***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PhD_PATH}    (//h4[contains(text(),'PhD Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PostdocPATH}    (//h4[contains(text(),'Postdoc Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])


***Test Cases***
# Create Application for Research Assistant
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Application for ResearchAssistant
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Open Custom Field
    Create Custom Field    Required Skills    textarea    java, python
    Close Custom Field
    Input Custom Field    0    java, python
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    # Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    # ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[1]
    # Should Be Equal As Strings    ${Role_Text}    Research Assistant
    Click Element    xpath=(//a[contains(., 'View Details')])[1]  #Click View details
    # ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
    # Should Be Equal As Strings  ${Detail_Role}  Research Assistant Position  #Check if show the right one
    Sleep    1s
    [Teardown]    Close Browser

# Create Application for Ph.D
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Application for Ph.D
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='phd']
    Sleep    1s
    Input Application    ${FORM_PhD_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Open Custom Field
    Create Custom Field    Required Skills    textarea    java, python
    Close Custom Field
    Input Custom Field    0    java, python
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
#     Sleep    0.5s
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[2]
#     Should Be Equal As Strings    ${Role_Text}    PhD
    Click Element    xpath=(//a[contains(., 'View Details')])[2]  #Click View details
#     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
#     Should Be Equal As Strings  ${Detail_Role}  PhD Position  #Check if show the right one
    Sleep    1s
    [Teardown]    Close Browser

# Create Application for Postdoc
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Application for Postdoc
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='postdoc']
    Sleep    1s
    Input Application    ${FORM_PostDoc_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000    per project    • Ph.D. in relevant field\n• Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    USA    Dew    few8855@gmail.com    0902386892    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.  
    Open Custom Field
    Create Custom Field    Required Skills    textarea    java, python
    Close Custom Field
    Input Custom Field    0    java, python
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
#     Sleep    0.5
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[3]
#     Should Be Equal As Strings    ${Role_Text}    Postdoc
    Click Element    xpath=(//a[contains(., 'View Details')])[3]  #Click View details
#     ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
#     Should Be Equal As Strings  ${Detail_Role}  Postdoc Position  #Check if show the right one
    Sleep    1s
    [Teardown]    Close Browser


# Check Application Detail In Group Page
#     Switch Tab    0
#     Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
#     Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

# Check Application Detail
#     Click Element    xpath=(//a[contains(text(),'รายละเอียด')])[1]
#     Execute JavaScript    
#     ...    let scrollInterval = setInterval(() => { window.scrollBy(0, 250); }, 500);
#     Sleep    2.5s
#     Go Back

# Update ResearchAssistant Application
#     Switch Tab    1
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
#     Sleep    1s
#     Click Element    xpath=(//a[contains(., 'View Details')])[1]
#     Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    
#     Edit Application    2025-03-15    1    • CV/Resume\n• Cover Letter    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-15     2025-09-20    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Save Changes
#     Sleep   3s

# Back to Application Detail
#     Click Element    css:.btn.btn-secondary.mt-3.ct-btn

# Delete Ph.D Application
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
#     Click Element    xpath=(//a[contains(., 'View Details')])[2]
#     Click Button    xpath=//button[contains(@class, 'btn-danger')]
#     Handle Alert    action=ACCEPT
#     Sleep    1s

# Postdoc Application Pass Deadline
#     Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
#     Click Element    xpath=(//a[contains(., 'View Details')])[2]
#     Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
#     Input Date Type    ${EMPTY}    app_deadline    2025-01-10
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Click Button    Save Changes
#     Click Element    css:.btn.btn-secondary.mt-3.ct-btn
#     Sleep    1s
