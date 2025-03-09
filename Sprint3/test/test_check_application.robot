***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Test Cases ***
# Guest Check Application
Open Website
    Open Web

Visit Research Group
    Go To Researcher Group
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[8]

Visit Research Group Detail
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    ${job_count}    Get Element Count    //tbody/tr

    Run Keyword If    ${job_count} > 0  
    ...    Log    Job openings exist: ${job_count} jobs available.
    ...    ELSE   
    ...    Element Should Be Visible    //div[contains(@class, 'empty-jobs-container')]  

Visit Application Detail
    Click Element    xpath=(//a[@class='btn-job-details'])[2]
    ${Role_Text}=    Get Text    xpath=//div[contains(@class, 'card-header')]
    Should Be Equal As Strings    ${Role_Text}    PhD

# # Researcher Check Application
# Open Website
#     Open Web

# Login
#     Input Email    wongsar@kku.ac.th
#     Input Password    id:password    123456789
#     Click Button    Log In
#     Switch Tab    0

# Visit Research Group
#     Go To Researcher Group
#     Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[4]

# Visit Research Group Detail
#     Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

# Visit Application Detail
#     Click Element    xpath=//a[@class='btn-job-details']

# # Head Group Check Application
# Open Website
#     Open Web

# Login
#     Input Email    wongsar@kku.ac.th
#     Input Password    id:password    123456789
#     Click Button    Log In
#     Switch Tab    0

# Visit Research Group
#     Go To Researcher Group
#     Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[4]

# Visit Research Group Detail
#     Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[4]
#     Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

# Visit Application Detail
#     Click Element    xpath=//a[@class='btn-job-details']