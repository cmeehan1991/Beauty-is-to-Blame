var el = wp.element.createElement,
	registerBlockType = wp.blocks.registerBlockType,
	RichText = wp.blocks.Editable,  // Rich text is not yet available so we have ot use Editable instead for now. 
	BlockControls = wp.blocks.BlockControls,
	AlignmentToolbar = wp.blocks.AlignmentToolbar;

	
registerBlockType('gutenberg-boilerplate-es5/rich-text', {
	title: 'Rich Text', 
	icon: 'text', 
	category: 'layout', 
	attributes: {
		content: {
			type: 'array', 
			source: 'children', 
			selector: 'p',
		},
		alignment: {
			type: 'string',
		}
	},
	edit: function(props){
		var content = props.attributes.content, 
			alignment = props.attributes.alignment,
			focus = props.focus;
		
		function onChangeContent(newContent){
			props.setAttributes({content: newContent});
		}
		
		function onChangeAlignment(newAlignment){
			props.setAttributes({alignment: newAlignment})
		}
		console.log(!!focus);
		return [
			!! focus && el(
				BlockControls, 
				{key: 'controls'},
				el(
					AlignmentToolbar,
					{
						value: alignment,
						onChange: onChangeAlignment
					}
				)
			),
			el(
				RichText,
				{
                    key: 'editable',
                    tagName: 'p',
                    className: props.className,
                    style: { textAlign: alignment },
                    onChange: onChangeContent,
                    value: content,
                    focus: focus,
                    onFocus: props.setFocus
                }
			)
		];
	},
	save: function(props){
		var content = props.attributes.content,
		alignment = props.attributes.alignment;
		return el('p', {className: props.className, style: {textAlign:alignment}}, content);
	},
	
});