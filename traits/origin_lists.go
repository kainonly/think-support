package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) originListsModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
