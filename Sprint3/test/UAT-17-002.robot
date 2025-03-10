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
    Click Element    xpath=(//a[@class='btn-job-details'])[1]
    Check Application Details Header    Postdoc    USA    Jun 28, 2025    $65,000 per project    5
    Check Basic Info    Open    110    Contract\nMar 2025 - Jul 2025    March 10, 2025    Dew    few8855@gmail.com    \n0902386892
    Check Custom Field    Required Skills    java, python
    Check Job Details    This is an exciting opportunity for this position.
    Check Required Qualifications    Ph.D. in relevant field\nResearch experience\nStrong publication record
    Check Application Process    Submit application through the online portal\nInitial screening\nInterviews
    Check Required Documents    CV/Resume\nCover Letter\nResearch Statement
    [Teardown]    Close Browser


# Teacher Check Application
Open Website
    Open Web

Go To Login
    Click Login

Teacher Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Switch Tab    0

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
    Click Element    xpath=(//a[@class='btn-job-details'])[1]
    Check Application Details Header    Postdoc    USA    Jun 28, 2025    $65,000 per project    5
    Check Basic Info    Open    110    Contract\nMar 2025 - Jul 2025    March 10, 2025    Dew    few8855@gmail.com    \n0902386892
    Check Custom Field    Required Skills    java, python
    Check Job Details    This is an exciting opportunity for this position.
    Check Required Qualifications    Ph.D. in relevant field\nResearch experience\nStrong publication record
    Check Application Process    Submit application through the online portal\nInitial screening\nInterviews
    Check Required Documents    CV/Resume\nCover Letter\nResearch Statement
    [Teardown]    Close Browser

# Head Group Check Application
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