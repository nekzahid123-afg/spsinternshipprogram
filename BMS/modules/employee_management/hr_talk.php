<?php
$page_title = 'HR Talk';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$questionnaire = [
    "What's going well in your role?",
    "What challenges or obstacles are you facing?",
    "How are you feeling being an SPS employee?",
    "Describe your overall experience and any aspects of the company culture or environment that you appreciate.",
    "On a scale of 1-10, how fulfilled are you? with 1 being the least satisfied and 10 being the most satisfied.",
    "How would you describe your working relationship with your manager or supervisor? Any specific feedback or suggestions?",
    "Are there any concerns related to work hours, schedules, or workload that you'd like to address?",
    "Can you suggest three actionable ideas or improvements that you believe could benefit the company?",
    "How can we support your professional development?",
    "What additional support or resources would enhance your job performance and job satisfaction?",
    "Is there anything else we can provide to make your work experience better?"
];
?>

<div class="container-fluid py-3 hr-talk-page">
    <div class="hr-talk-card">
        <div class="hr-talk-heading">
            <div class="page-title-wrap">
                <h4 class="page-title"><i class="fa fa-server"></i> HR Talk</h4>
            </div>
            <button type="button" class="btn btn-primary hr-talk-send-top"><i class="fa fa-paper-plane"></i> Send
                Email</button>
        </div>

        <a class="btn btn-outline-primary hr-talk-close"
            href="<?php echo $base_url; ?>/modules/employee_management/index.php">
            <i class="fa fa-times"></i> Close
        </a>

        <div class="hr-talk-scrollbar" aria-hidden="true"></div>

        <section class="hr-talk-editor-section" aria-labelledby="questionnaire-heading">
            <h5 id="questionnaire-heading">Questionnaire:</h5>

            <div class="blog-editor" data-editor>
                <div class="editor-toolbar" role="toolbar" aria-label="Questionnaire editor toolbar">
                    <div class="editor-select-group">
                        <select title="Styles" aria-label="Styles">
                            <option>Styles</option>
                            <option>Heading 1</option>
                            <option>Heading 2</option>
                            <option>Normal</option>
                        </select>
                        <select title="Format" aria-label="Format">
                            <option>Format</option>
                            <option>Paragraph</option>
                            <option>Blockquote</option>
                        </select>
                        <select title="Font" aria-label="Font">
                            <option>Font</option>
                            <option>Sans Serif</option>
                            <option>Serif</option>
                            <option>Monospace</option>
                        </select>
                        <select title="Size" aria-label="Size">
                            <option>Size</option>
                            <option>Small</option>
                            <option>Normal</option>
                            <option>Large</option>
                        </select>
                    </div>

                    <div class="editor-tool-group">
                        <button type="button" data-command="bold" title="Bold" aria-label="Bold"><i
                                class="fa fa-bold"></i></button>
                        <button type="button" data-command="italic" title="Italic" aria-label="Italic"><i
                                class="fa fa-italic"></i></button>
                        <button type="button" data-command="underline" title="Underline" aria-label="Underline"><i
                                class="fa fa-underline"></i></button>
                    </div>

                    <div class="editor-tool-group">
                        <button type="button" data-command="undo" title="Undo" aria-label="Undo"><i
                                class="fa fa-undo"></i></button>
                        <button type="button" data-command="redo" title="Redo" aria-label="Redo"><i
                                class="fa fa-repeat"></i></button>
                        <button type="button" data-command="cut" title="Cut" aria-label="Cut"><i
                                class="fa fa-scissors"></i></button>
                        <button type="button" data-command="copy" title="Copy" aria-label="Copy"><i
                                class="fa fa-files-o"></i></button>
                        <button type="button" data-command="paste" title="Paste" aria-label="Paste"><i
                                class="fa fa-clipboard"></i></button>
                        <button type="button" data-command="find" title="Find and replace"
                            aria-label="Find and replace"><i class="fa fa-search"></i></button>
                    </div>

                    <div class="editor-tool-group">
                        <button type="button" data-command="outdent" title="Decrease indent"
                            aria-label="Decrease indent"><i class="fa fa-outdent"></i></button>
                        <button type="button" data-command="indent" title="Increase indent"
                            aria-label="Increase indent"><i class="fa fa-indent"></i></button>
                        <button type="button" data-command="print" title="Print" aria-label="Print"><i
                                class="fa fa-print"></i></button>
                        <button type="button" data-command="insertOrderedList" title="Numbered list"
                            aria-label="Numbered list"><i class="fa fa-list-ol"></i></button>
                        <button type="button" data-command="insertUnorderedList" title="Bulleted list"
                            aria-label="Bulleted list"><i class="fa fa-list-ul"></i></button>
                    </div>

                    <div class="editor-tool-group">
                        <button type="button" data-command="justifyLeft" title="Align left" aria-label="Align left"><i
                                class="fa fa-align-left"></i></button>
                        <button type="button" data-command="justifyCenter" title="Align center"
                            aria-label="Align center"><i class="fa fa-align-center"></i></button>
                        <button type="button" data-command="justifyRight" title="Align right"
                            aria-label="Align right"><i class="fa fa-align-right"></i></button>
                        <button type="button" data-command="justifyFull" title="Justify" aria-label="Justify"><i
                                class="fa fa-align-justify"></i></button>
                    </div>

                    <div class="editor-tool-group">
                        <button type="button" data-command="insertImage" title="Insert image"
                            aria-label="Insert image"><i class="fa fa-picture-o"></i></button>
                        <button type="button" data-command="insertTable" title="Insert table"
                            aria-label="Insert table"><i class="fa fa-table"></i></button>
                        <button type="button" data-command="createLink" title="Insert link" aria-label="Insert link"><i
                                class="fa fa-link"></i></button>
                        <button type="button" data-command="emoji" title="Insert emoji" aria-label="Insert emoji"><i
                                class="fa fa-smile-o"></i></button>
                        <button type="button" data-command="foreColor" title="Text color" aria-label="Text color"><i
                                class="fa fa-font"></i></button>
                        <button type="button" data-command="backColor" title="Text highlight"
                            aria-label="Text highlight"><i class="fa fa-font"></i></button>
                    </div>

                    <div class="editor-tool-group editor-view-group">
                        <button type="button" data-command="source" title="Source view" aria-label="Source view"><i
                                class="fa fa-code"></i> Source</button>
                        <button type="button" data-command="fullscreen" title="Fullscreen" aria-label="Fullscreen"><i
                                class="fa fa-expand"></i></button>
                    </div>
                </div>

                <div class="editor-body" contenteditable="true" role="textbox" aria-multiline="true"
                    aria-label="Questionnaire content">
                    <?php foreach ($questionnaire as $question): ?>
                        <p><?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
                <textarea class="editor-source" aria-label="HTML source"></textarea>
            </div>
        </section>

        <div class="hr-talk-actions">
            <label class="hr-talk-checkbox">
                <input type="checkbox" name="send_email" value="1">
                <span>Send Email</span>
            </label>
            <button type="button" class="btn btn-primary hr-talk-save"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</div>

<style>
    .hr-talk-page {
        max-width: 1500px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .hr-talk-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
        padding: 1.15rem 0.85rem 1rem;
    }

    .hr-talk-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding: 0 0.35rem;
    }

    .hr-talk-heading .page-title-wrap {
        margin: 0;
    }

    .hr-talk-heading .page-title {
        color: #334155;
        font-size: clamp(1.55rem, 2.4vw, 2.35rem);
    }

    .hr-talk-heading .page-title .fa {
        color: #475569;
    }

    .hr-talk-send-top {
        min-width: 122px;
        margin-top: 5.3rem;
    }

    .hr-talk-close {
        min-width: 78px;
        margin: 2.3rem 0 1.25rem 0.35rem;
    }

    .hr-talk-scrollbar {
        height: 23px;
        overflow-x: scroll;
        overflow-y: hidden;
        border: 1px solid #9ca3af;
        border-radius: 4px;
        margin-bottom: 0.45rem;
        background: #fff;
    }

    .hr-talk-scrollbar::after {
        content: '';
        display: block;
        width: 1800px;
        height: 1px;
    }

    .hr-talk-editor-section {
        background: #f8fafc;
        border-radius: 5px;
        padding-bottom: 0.7rem;
    }

    .hr-talk-editor-section h5 {
        margin: 0;
        padding: 0.05rem 0 0.45rem;
        color: #334155;
        font-size: 1.25rem;
        font-weight: 700;
    }

    .blog-editor {
        border: 1px solid #cbd5e1;
        background: #fff;
    }

    .editor-toolbar {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.15rem;
        min-height: 51px;
        padding: 0.3rem 0.45rem;
        border-bottom: 1px solid #cbd5e1;
        background: #f8f8f8;
    }

    .editor-select-group,
    .editor-tool-group {
        display: inline-flex;
        align-items: center;
        gap: 0.1rem;
        padding: 0 0.35rem;
        border-right: 1px solid #cbd5e1;
    }

    .editor-select-group select {
        height: 31px;
        min-width: 72px;
        border: 0;
        background: transparent;
        color: #334155;
        font-size: 0.82rem;
        padding: 0 0.25rem;
    }

    .editor-select-group select:focus {
        outline: 1px solid #94a3b8;
    }

    .editor-tool-group button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 29px;
        height: 29px;
        border: 0;
        border-radius: 3px;
        background: transparent;
        color: #475569;
        padding: 0 0.3rem;
        font-size: 0.84rem;
    }

    .editor-tool-group button:hover,
    .editor-tool-group button:focus,
    .editor-tool-group button.is-active {
        background: #e2e8f0;
        color: var(--primary-brand, #4f46e5);
        outline: none;
    }

    .editor-view-group {
        border-right: 0;
    }

    .editor-view-group button[data-command="source"] {
        gap: 0.3rem;
        padding: 0 0.45rem;
    }

    .editor-body,
    .editor-source {
        display: block;
        width: 100%;
        min-height: 560px;
        max-height: 760px;
        resize: vertical;
        overflow: auto;
        border: 0;
        outline: 0;
        padding: 1.8rem 1.35rem;
        background: #fff;
        color: #0f3f6f;
        font-size: 0.98rem;
        line-height: 1.55;
    }

    .editor-body p {
        margin: 0 0 1.05rem;
    }

    .editor-source {
        display: none;
        font-family: Consolas, monospace;
    }

    .blog-editor.source-mode .editor-body {
        display: none;
    }

    .blog-editor.source-mode .editor-source {
        display: block;
    }

    .blog-editor.fullscreen-mode {
        position: fixed;
        inset: 0.75rem;
        z-index: 1050;
        display: flex;
        flex-direction: column;
        box-shadow: 0 1rem 3rem rgba(15, 23, 42, 0.25);
    }

    .blog-editor.fullscreen-mode .editor-body,
    .blog-editor.fullscreen-mode .editor-source {
        flex: 1;
        max-height: none;
    }

    .hr-talk-actions {
        display: flex;
        align-items: center;
        gap: 1.3rem;
        padding-top: 0.8rem;
    }

    .hr-talk-checkbox {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        margin: 0;
        color: #334155;
        font-size: 0.95rem;
    }

    .hr-talk-checkbox input {
        width: 15px;
        height: 15px;
        accent-color: var(--primary-brand, #4f46e5);
    }

    .hr-talk-save {
        min-width: 72px;
    }

    @media (max-width: 767.98px) {
        .hr-talk-heading {
            flex-direction: column;
        }

        .hr-talk-send-top {
            margin-top: 0;
            align-self: flex-end;
        }

        .hr-talk-close {
            margin-top: 1rem;
        }

        .editor-toolbar {
            align-items: flex-start;
        }

        .editor-select-group,
        .editor-tool-group {
            border-right: 0;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 0.2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editor = document.querySelector('[data-editor]');
        const body = editor.querySelector('.editor-body');
        const source = editor.querySelector('.editor-source');

        function focusEditor() {
            body.focus();
        }

        function runCommand(command) {
            if (command === 'find') {
                const term = window.prompt('Find text');
                if (!term) {
                    return;
                }
                const replacement = window.prompt('Replace with', '');
                if (replacement === null) {
                    return;
                }
                body.innerHTML = body.innerHTML.split(term).join(replacement);
                focusEditor();
                return;
            }

            if (command === 'insertImage') {
                const url = window.prompt('Image URL');
                if (url) {
                    document.execCommand('insertImage', false, url);
                }
                focusEditor();
                return;
            }

            if (command === 'insertTable') {
                document.execCommand('insertHTML', false, '<table><tbody><tr><td> </td><td> </td></tr><tr><td> </td><td> </td></tr></tbody></table>');
                focusEditor();
                return;
            }

            if (command === 'createLink') {
                const url = window.prompt('Link URL');
                if (url) {
                    document.execCommand('createLink', false, url);
                }
                focusEditor();
                return;
            }

            if (command === 'emoji') {
                document.execCommand('insertText', false, ':)');
                focusEditor();
                return;
            }

            if (command === 'foreColor' || command === 'backColor') {
                const color = window.prompt('Enter a color value', command === 'foreColor' ? '#4F46E5' : '#FEF3C7');
                if (color) {
                    document.execCommand(command, false, color);
                }
                focusEditor();
                return;
            }

            if (command === 'print') {
                window.print();
                return;
            }

            if (command === 'source') {
                if (editor.classList.contains('source-mode')) {
                    body.innerHTML = source.value;
                    editor.classList.remove('source-mode');
                } else {
                    source.value = body.innerHTML;
                    editor.classList.add('source-mode');
                }
                return;
            }

            if (command === 'fullscreen') {
                editor.classList.toggle('fullscreen-mode');
                return;
            }

            document.execCommand(command, false, null);
            focusEditor();
        }

        editor.querySelectorAll('[data-command]').forEach(function (button) {
            button.addEventListener('click', function () {
                runCommand(button.getAttribute('data-command'));
            });
        });

        editor.querySelectorAll('select').forEach(function (select) {
            select.addEventListener('change', function () {
                if (select.getAttribute('aria-label') === 'Styles') {
                    document.execCommand('formatBlock', false, select.value === 'Heading 1' ? 'h1' : select.value === 'Heading 2' ? 'h2' : 'p');
                }
                if (select.getAttribute('aria-label') === 'Size') {
                    document.execCommand('fontSize', false, select.value === 'Large' ? '5' : select.value === 'Small' ? '2' : '3');
                }
                focusEditor();
            });
        });

        document.querySelector('.hr-talk-save').addEventListener('click', function () {
            window.alert('Questionnaire is ready to be saved.');
        });

        document.querySelector('.hr-talk-send-top').addEventListener('click', function () {
            window.alert('Questionnaire email is ready to be sent.');
        });
    });
</script>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>