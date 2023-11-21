import './index.scss';
import metadata from '../block.json';
import { registerBlockType } from '@wordpress/blocks';
import {useBlockProps, InnerBlocks} from '@wordpress/block-editor';

registerBlockType(
	metadata,
	{
		edit,
		save
	}
);

function edit(props) {

	const blockProps = useBlockProps();

    // Permitted blocks
    const allowedBlocks = ["core/cover"];

	const innerBlocksTemplate =
	[ ["core/cover", {}],];
	// If we need to create more blocks right away, just comment below and uncommnent below
	//Array.from({ length: 6 }, () => ["core/cover", {}]);

    return (
        <div {...blockProps}>
			<div className="blaze_tiles" style={{backgroundColor: "#000", padding: "40px"}}>
				<p style={{color: "#fff", textAlign: "center"}}>Blaze Tiles</p>
				<InnerBlocks
					allowedBlocks={allowedBlocks}
					template={innerBlocksTemplate}
                    templateLock={false}
				/>
			</div>
        </div>
    );
}


function save(props){
	const { align } = props.attributes;

	return (
		<div className={"align" + align + " frontend-wrapper blaze_tiles"}>
			<InnerBlocks.Content />
		</div>
	)
}
