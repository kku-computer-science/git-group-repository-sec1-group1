***Settings***
Resource    resource.robot
Library    XML

***Test Cases***
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    admin@gmail.com
    Input Password    id:password    12345678
    Click Button    Log In
    Title Should Be    Dashboard

Create Project
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]
    Click Element    css:button.create-project-btn
    Input Text    id:projectName    Project
    Input Text    id:projectDescription    Description
    Input Text    id:projectContact    111-1111-111
    Click Button    Create
    
Create Application for ResearchAssistant
    Click Element    xpath=//h5[contains(text(),'Project')]/ancestor::a
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Select From List By Index    xpath = //select[@id='positionSelect']    0
    Sleep    1s
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Execute JavaScript    document.querySelector("input[name='app_deadline[]']").value = '2025-02-23T14:30';
    Input Text    xpath=(//input[@name="amount[]"])[1]    1000
    Input Text    xpath=(//textarea[@name="app_detail[]"])[1]    Provide details here...
    Input Text    xpath=(//input[@name="app_condition[]"])[1]    Conditions apply...
    Click Button    Submit All Applications
    Element Should Be Visible    xpath=//div[@class='row']/div[contains(@class, 'col-md-6')]
    Sleep    1s