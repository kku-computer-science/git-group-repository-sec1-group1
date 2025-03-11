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
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[2]

Visit Research Group Detail
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[2]
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[2]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    ${job_count}    Get Element Count    //tbody/tr

    Run Keyword If    ${job_count} > 0  
    ...    Log    Job openings exist: ${job_count} jobs available.
    ...    ELSE   
    ...    Element Should Be Visible    //div[contains(@class, 'empty-jobs-container')]  

Visit Application Detail
    Click Element    xpath=(//a[@class='btn-job-details'])[2]
    Check Application Details Header    Postdoc    Khon Kaen University(Full time)    May 04, 2025    $61,000 per year    3
    Check Basic Info    Open    54    Contract\nJul 2025 - Jul 2027    July 01, 2025    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th    \n0902386892
    Check Custom Field    Responsibilities    This is a full-time position for two years. The successful candidate is expected to teach two courses per year (50%) and work with existing faculty members in pursuing data visualization and analytics research projects (50%). The successful will also contribute towards publishing top-tier journal articles and curriculum development in data visualization and analytics. Other responsibilities may include service roles.
    Scroll Element Into View    xpath=//div[@class='card-body'][.//h3[contains(.,'Job Description')]]//p
    Check Job Details    The Department of Communications and New Media is seeking applicants for the position of Postdoctoral Fellow in Data Visualization and Analytics, specializing in data visualization and analytics. Applicants should demonstrate a keen understanding of current and emerging trends in the communications industry, as well as excellence and innovation in practice-led pedagogy.
    Scroll Element Into View    xpath=//h4[text()="Preferred"]/following-sibling::ul
    Check Required Qualifications    Successful candidates must hold a PhD in a discipline closely related to data visualization and analytics by date of appointment, with evidence of interdisciplinary research applying computational methods to the social sciences. This includes but is not limited to social science disciplines (sociology, political science, communication, economics etc.) or computer science and related disciplines (information science, data science, computational physics etc.)
    Check Preferred Qualifications    Experience that demonstrates a strong publication record.\nDemonstrated ability or potential to mentor research of undergraduate and graduate students.\nDemonstrated ability or potential to engage in professional and institutional service and leadership.\nEvidence of ability to work with diverse student, faculty, and staff populations.
    Scroll Element Into View    xpath=//h4[text()="Required Documents"]/following-sibling::ul
    Check Application Process    Submit application through the online portal\nInitial screening\nInterviews
    Check Required Documents    A Cover Letter\nFull CV: academic and employment history, degrees obtained, scholarships and awards, post-doctoral and clinical/ residency training (where applicable), other study and research opportunities, Name of PhD supervisor, etc.\nA research statement (max of 3 pages) of major accomplishments in research, citing up to five research, citing up to five significant publications, creative work or other scholarly contribution, and explaining their significance. Including sample copies, complete list of publication and impact, and evidence of international visibility.\nA Teaching Statement that focuses on evidence of student learning and educational leadership (if applicable). A preface (maximum 300 words) that makes the case for your appointment. This should be highly distilled summary of your key contributions to student learning and educational leadership, guided by your teaching philosophy.\nScanned copies of academic certificates and transcripts\nA list of FOUR Referees (including one from the applicant’s PhD or post-doctoral advisor/supervisor). Referees are to submit their letters directly to cnmcareer@nus.edu.sg
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
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[2]

Visit Research Group Detail
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[2]
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[2]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    ${job_count}    Get Element Count    //tbody/tr

    Run Keyword If    ${job_count} > 0  
    ...    Log    Job openings exist: ${job_count} jobs available.
    ...    ELSE   
    ...    Element Should Be Visible    //div[contains(@class, 'empty-jobs-container')]  

Visit Application Detail
    Click Element    xpath=(//a[@class='btn-job-details'])[2]
    Check Application Details Header    Postdoc    Khon Kaen University(Full time)    May 04, 2025    $61,000 per year    3
    Check Basic Info    Open    54    Contract\nJul 2025 - Jul 2027    July 01, 2025    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th    \n0902386892
    Check Custom Field    Responsibilities    This is a full-time position for two years. The successful candidate is expected to teach two courses per year (50%) and work with existing faculty members in pursuing data visualization and analytics research projects (50%). The successful will also contribute towards publishing top-tier journal articles and curriculum development in data visualization and analytics. Other responsibilities may include service roles.
    Scroll Element Into View    xpath=//div[@class='card-body'][.//h3[contains(.,'Job Description')]]//p
    Check Job Details    The Department of Communications and New Media is seeking applicants for the position of Postdoctoral Fellow in Data Visualization and Analytics, specializing in data visualization and analytics. Applicants should demonstrate a keen understanding of current and emerging trends in the communications industry, as well as excellence and innovation in practice-led pedagogy.
    Scroll Element Into View    xpath=//h4[text()="Preferred"]/following-sibling::ul
    Check Required Qualifications    Successful candidates must hold a PhD in a discipline closely related to data visualization and analytics by date of appointment, with evidence of interdisciplinary research applying computational methods to the social sciences. This includes but is not limited to social science disciplines (sociology, political science, communication, economics etc.) or computer science and related disciplines (information science, data science, computational physics etc.)
    Check Preferred Qualifications    Experience that demonstrates a strong publication record.\nDemonstrated ability or potential to mentor research of undergraduate and graduate students.\nDemonstrated ability or potential to engage in professional and institutional service and leadership.\nEvidence of ability to work with diverse student, faculty, and staff populations.
    Scroll Element Into View    xpath=//h4[text()="Required Documents"]/following-sibling::ul
    Check Application Process    Submit application through the online portal\nInitial screening\nInterviews
    Check Required Documents    A Cover Letter\nFull CV: academic and employment history, degrees obtained, scholarships and awards, post-doctoral and clinical/ residency training (where applicable), other study and research opportunities, Name of PhD supervisor, etc.\nA research statement (max of 3 pages) of major accomplishments in research, citing up to five research, citing up to five significant publications, creative work or other scholarly contribution, and explaining their significance. Including sample copies, complete list of publication and impact, and evidence of international visibility.\nA Teaching Statement that focuses on evidence of student learning and educational leadership (if applicable). A preface (maximum 300 words) that makes the case for your appointment. This should be highly distilled summary of your key contributions to student learning and educational leadership, guided by your teaching philosophy.\nScanned copies of academic certificates and transcripts\nA list of FOUR Referees (including one from the applicant’s PhD or post-doctoral advisor/supervisor). Referees are to submit their letters directly to cnmcareer@nus.edu.sg
    [Teardown]    Close Browser
