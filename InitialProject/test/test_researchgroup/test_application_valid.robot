***Settings***
Resource    resource.robot
Library    XML
Library    String

***Test Cases***
Open Website
    Open Web

Go To ResearchGroup Page
    Go To Researcher Group

Go To Login
    Click Login

Login
    Input Email    admin@gmail.com
    Input Password    id:password    12345678
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Project    Description    111-1111-111
    
Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a

# Create Application for ResearchAssistant
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Select From List By Index    xpath = //select[@id='positionSelect']    0
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Input Application    2025-03-23T16:30    10    Provide details for ResearchAssistant    Conditions apply for ResearchAssistant
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'card-title') and contains(text(), 'Role:')])[1]
#     Should Be Equal As Strings    ${Role_Text}    Role: Research Assistant
#     Sleep    1s

# Create Application for Ph.D
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Select From List By Index    xpath = //select[@id='positionSelect']    1
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Input Application    2025-04-10T16:30    10    Provide details for Ph.D    Conditions apply for Ph.d
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'card-title') and contains(text(), 'Role:')])[2]
#     Should Be Equal As Strings    ${Role_Text}    Role: PhD
#     Sleep    1s

# Create Application for Postdoc
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Select From List By Index    xpath = //select[@id='positionSelect']    2
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Input Application    2025-04-15T16:30    10    Provide details for Postdoc    Conditions apply for Posedoc
#     ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'card-title') and contains(text(), 'Role:')])[3]
#     Should Be Equal As Strings    ${Role_Text}    Role: Postdoc
#     Sleep    1s

# Edit Project Name
      #Click Edit Button
#     Click Element    xpath=//button[@data-bs-target='#editProjectModal']
#     Input Text    id:project_title    EditedProject
#     Click Button    Save Changes
#     ${Name_Text}    Get Text    xpath=//h3[contains(@class, 'text-primary')]
#     Should Be Equal As Strings    ${text}    EditedProject
#     Sleep    1s

# Edit Project Description
#     Click Element    xpath=//button[@data-bs-target='#editProjectModal']
#     Input Text    id:project_details    EditedDescription
#     ${Detail_Text} =    Get Text    xpath=//p[@class='text-muted']
#     Should Be Equal As Strings    ${Detail_Text}    EditedDescription
#     Click Button    Save Changes
#     Sleep    1s

# Edit Project Contact
#     Click Element    xpath=//button[@data-bs-target='#editProjectModal']
#     Input Text    id:contact    222-2222-222
#     Click Button    Save Changes
#     ${Contact_Text} =    Get Text    xpath=//p[strong[text()='Contact:']]
#     Should Be Equal As Strings    ${Contact_Text}    Contact: 222-2222-222
#     Sleep    1s

# Delete Project
#     # Click the delete button
#     Click Button    xpath=//button[contains(@class, 'btn-danger')]
#     Handle Alert    action=ACCEPT

# Date Pass Deadline
#     Click Element    xpath=//a[contains(text(), 'Create Application')]
#     Select From List By Index    xpath = //select[@id='positionSelect']    0
#     Sleep    1s
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
#     Input Application    2025-02-23T16:30    10    Provide details for ResearchAssistant    Conditions apply for ResearchAssistant
#     ${Status_Text} =    Get Text    xpath=//p[strong[text()='Status:']]
#     Should Be Equal As Strings    ${Status_Text}    Status: Closed
#     Sleep    1s
