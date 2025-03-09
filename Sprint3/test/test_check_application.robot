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
    ${Header_Text}=    Get Text    xpath=//div[contains(@class, 'card-header')]
    ${Body_Text}=    Get Text    xpath=//div[contains(@class,'grid')]
    ${Custom_Field_Text}=    Get Text    xpath=//div[contains(@class, 'custom-field')][div[contains(@class, 'custom-field-label')][contains(text(), 'Required Skills')]]/div[contains(@class, 'custom-field-value')]
    ${Desc_Text}=    Get Text    xpath=//div[@class='card-body'][.//h3[contains(.,'Job Description')]]//p
    ${Required_Qualification_Text}=    Get Text    xpath=//h4[text()="Required"]/following-sibling::ul
    ${Preferred_Qualification_Text}=    Get Text    xpath=//h4[text()="Preferred"]/following-sibling::ul
    ${Process_Text}=    Get Text    xpath=//h4[text()="How to Apply"]/following-sibling::ul
    ${Documents_Text}=    Get Text    xpath=//h4[text()="Required Documents"]/following-sibling::ul
    Should Be Equal As Strings    ${Header_Text}    Postdoc\nUSA\nApply by Mar 21, 2025\n$65,000 per project\n5 position(s)
    Should Be Equal As Strings    ${Body_Text}    Status\nOpen (12 days left)\nEmployment Type\nContract\nMar 2025 - Jul 2025\nStart Date\nMarch 10, 2025\nContact\nDew\nfew8855@gmail.com\n0902386892
    Should Be Equal As Strings    ${Custom_Field_Text}    java, python
    Should Be Equal As Strings    ${Desc_Text}    This is an exciting opportunity for this position.
    Should Be Equal As Strings    ${Required_Qualification_Text}    Ph.D. in relevant field\nResearch experience\nStrong publication record
    Should Be Equal As Strings    ${Preferred_Qualification_Text}    Teaching experience\nIndustry collaboration experience
    Should Be Equal As Strings    ${Process_Text}    Submit application through the online portal\nInitial screening\nInterviews
    Should Be Equal As Strings    ${Documents_Text}    CV/Resume\nCover Letter\nResearch Statement


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