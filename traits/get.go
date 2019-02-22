package traits

import (
	"context"
	"github.com/asaskevich/govalidator"
	"github.com/kainonly/iris-bit/facade"
	"github.com/kataras/iris"
	"github.com/mongodb/mongo-go-driver/bson"
)

type (
	getCycle struct {
		GetBeforeHooks  func() bool
		GetCustomReturn func(interface{})
	}

	getPost struct {
		Id string `json:"id" valid:"required"`
	}
)

func (c *Traits) getModel(ctx iris.Context) {
	var post getPost
	ctx.ReadJSON(&post)

	if _, err = govalidator.ValidateStruct(post); err != nil {
		c.Failed(ctx, err.Error())
		return
	}

	if c.GetCycle.GetBeforeHooks != nil {
		if result := c.GetCycle.GetBeforeHooks(); !result {
			return
		}
	}

	var data map[string]interface{}
	if err = facade.Db.Collection(c.M).FindOne(context.Background(),
		bson.D{{"_id", post.Id}},
	).Decode(data); err != nil {
		c.Failed(ctx, err.Error())
		return
	}

	ctx.JSON(iris.Map{})
}
